<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\URL;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

/**
 * Non-regression tests for the two production bugs:
 *  - design loaded from a remote Tailwind CDN (must be local and committed);
 *  - absolute URLs/Location leaking the internal proxy port.
 */
class ProductionFixesTest extends TestCase
{
    /**
     * @return array<string, array{string}>
     */
    public static function pageProvider(): array
    {
        return [
            'accueil' => ['/'],
            'annonces' => ['/annonces'],
            'recherche' => ['/recherche'],
            'creer une annonce' => ['/annonces/creer'],
            'demandes' => ['/demandes'],
            'creer une demande' => ['/demandes/creer'],
            'connexion' => ['/connexion'],
            'inscription' => ['/inscription'],
            'mot de passe oublie' => ['/mot-de-passe-oublie'],
            'tableau de bord acheteur' => ['/tableau-de-bord'],
            'tableau de bord vendeur' => ['/tableau-de-bord/vendeur'],
            'profil vendeur' => ['/profil-vendeur'],
            'qui sommes nous' => ['/qui-sommes-nous'],
            'conditions utilisation' => ['/conditions-utilisation'],
        ];
    }

    #[DataProvider('pageProvider')]
    public function test_every_page_uses_the_local_stylesheet_and_no_cdn(string $path): void
    {
        if (in_array($path, ['/tableau-de-bord', '/tableau-de-bord/vendeur'], true)) {
            $this->actingAs(User::factory()->create());
        }

        $this->get($path)
            ->assertOk()
            ->assertSee('assets/app.css', false)
            ->assertDontSee('cdn.tailwindcss.com', false)
            ->assertDontSee('assets/theme.js', false);
    }

    public function test_committed_stylesheet_exists_and_contains_the_expected_utilities(): void
    {
        $path = public_path('assets/app.css');

        $this->assertFileExists($path);
        $this->assertGreaterThan(10_000, filesize($path), 'app.css looks like an empty/unbuilt file.');

        $css = file_get_contents($path);

        foreach (['.bg-terracotta-500', '.text-ink', '.font-display', '.shadow-soft', '--color-terracotta-500'] as $needle) {
            $this->assertStringContainsString($needle, $css, "Missing utility in compiled CSS: {$needle}");
        }

        $this->assertStringNotContainsString('cdn.tailwindcss.com', $css);
    }

    public function test_public_stylesheet_does_not_load_remote_fonts(): void
    {
        $path = public_path('assets/style.css');

        $this->assertFileExists($path);

        $css = file_get_contents($path);

        $this->assertStringNotContainsString('fonts.googleapis.com', $css);
        $this->assertStringNotContainsString('fonts.gstatic.com', $css);
        $this->assertDoesNotMatchRegularExpression('/@import\s+url\(\s*[\'"]?https?:/i', $css);
        // Le reste de la feuille doit survivre à la suppression de l'import.
        $this->assertStringContainsString('scroll-behavior: smooth', $css);
        $this->assertStringContainsString('.mockup-flag', $css);
    }

    public function test_css_sources_scan_blade_views_and_declare_theme_tokens(): void
    {
        $css = file_get_contents(resource_path('css/app.css'));

        $this->assertStringContainsString("@import 'tailwindcss';", $css);
        $this->assertStringContainsString('@source', $css);
        $this->assertStringContainsString('resources/views', $css);
        $this->assertStringContainsString('@theme', $css);

        foreach (['cream', 'paper', 'ink', 'terracotta', 'sage', 'soft', 'lift'] as $token) {
            $this->assertStringContainsString($token, $css, "Missing design token: {$token}");
        }
    }

    public function test_forwarded_headers_are_trusted_for_generated_urls(): void
    {
        $response = $this->get('/', [
            'Host' => '127.0.0.1:8080',
            'X-Forwarded-Host' => 'brocante.example.org',
            'X-Forwarded-Proto' => 'https',
            'X-Forwarded-Port' => '443',
            'X-Forwarded-For' => '203.0.113.10',
        ]);

        $response->assertOk()
            ->assertSee('https://brocante.example.org/assets/app.css', false)
            ->assertDontSee('127.0.0.1:8080', false);
    }

    public function test_login_redirect_uses_the_public_host_not_the_internal_port(): void
    {
        $user = User::factory()->create();

        $this->post('/connexion', [
            'email' => $user->email,
            'password' => 'password',
        ], [
            'Host' => '127.0.0.1:8080',
            'X-Forwarded-Host' => 'brocante.example.org',
            'X-Forwarded-Proto' => 'https',
            'X-Forwarded-Port' => '443',
        ])
            ->assertRedirect('https://brocante.example.org')
            ->assertHeader('Location', 'https://brocante.example.org');
    }

    public function test_provider_forces_the_public_url_outside_local(): void
    {
        config([
            'app.env' => 'production',
            'app.url' => 'https://mon-domaine.tld',
        ]);

        new AppServiceProvider($this->app)->boot();

        $this->assertSame('https://mon-domaine.tld', URL::to('/'));
        $this->assertSame('https://', substr(URL::to('/annonces'), 0, 8));
    }

    public function test_provider_does_not_override_urls_in_local(): void
    {
        config([
            'app.env' => 'local',
            'app.url' => 'http://localhost:8080',
        ]);

        new AppServiceProvider($this->app)->boot();

        $this->assertStringStartsWith('http://localhost', URL::to('/'));
        $this->assertStringNotContainsString('mon-domaine.tld', URL::to('/'));
    }

    public function test_env_example_targets_production_without_internal_port(): void
    {
        $env = file_get_contents(base_path('.env.example'));

        $this->assertStringContainsString('APP_ENV=production', $env);
        $this->assertStringContainsString('APP_DEBUG=false', $env);
        $this->assertStringContainsString('APP_URL=https://', $env);
        $this->assertDoesNotMatchRegularExpression('/^APP_URL=http:\/\/localhost/mi', $env);
        $this->assertStringContainsString('LOG_LEVEL=error', $env);
        $this->assertStringNotContainsString('LOG_LEVEL=debug', $env);
    }

    public function test_readme_documents_proxy_deployment(): void
    {
        $readme = file_get_contents(base_path('README.md'));

        foreach ([
            'reverse proxy',
            'X-Forwarded-Host',
            'X-Forwarded-Proto',
            'X-Forwarded-Port',
            'php artisan serve --host=0.0.0.0',
            'storage:link',
            'config:cache',
            'APP_DEBUG=false',
        ] as $needle) {
            $this->assertStringContainsString($needle, $readme, "README is missing: {$needle}");
        }
    }

    public function test_package_json_exposes_a_css_build_script(): void
    {
        $package = json_decode(file_get_contents(base_path('package.json')), true, flags: JSON_THROW_ON_ERROR);

        $this->assertArrayHasKey('@tailwindcss/cli', $package['devDependencies']);
        $this->assertArrayHasKey('build:css', $package['scripts']);
        $this->assertStringContainsString('public/assets/app.css', $package['scripts']['build:css']);
    }
}
