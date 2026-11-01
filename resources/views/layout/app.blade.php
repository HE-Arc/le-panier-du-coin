@php
    $navItems = [
        ['route' => 'home', 'label' => 'Accueil', 'active' => request()->routeIs('home')],
        ['route' => 'articles.index', 'label' => 'Annonces', 'active' => request()->routeIs('articles.index', 'search', 'articles.show', 'articles.create')],
        ['route' => 'requests.index', 'label' => 'Demandes', 'active' => request()->routeIs('requests.*')],
        ['route' => 'about', 'label' => 'Qui sommes-nous', 'active' => request()->routeIs('about')],
    ];
@endphp

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@hasSection('title')@yield('title') — @endif{{ 'Le Panier du coin' }}</title>
    <meta name="description" content="@yield('meta_description', 'La brocante communautaire de ta ville : vends, cherche et trouve des objets près de chez toi.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('assets/theme.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body class="min-h-screen font-sans antialiased">
    <a href="#contenu" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded-lg focus:bg-ink focus:px-4 focus:py-2 focus:text-paper">Aller au contenu</a>

    <!-- ================================= Barre de navigation() ================================= -->
    <header class="sticky top-0 z-40 border-b border-ink/10 bg-paper/90 backdrop-blur">
        <div class="mx-auto flex h-16 max-w-6xl items-center gap-6 px-4">
            <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2">
                <span class="grid h-9 w-9 place-items-center rounded-xl bg-terracotta-100 text-terracotta-600" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                        <path d="M3 8h18l-1.6 9.2a2 2 0 0 1-2 1.8H6.6a2 2 0 0 1-2-1.8L3 8Z"/>
                        <path d="M8 8 10 3M16 8 14 3"/>
                        <path d="M9.5 12v3M14.5 12v3"/>
                    </svg>
                </span>
                <span class="font-display text-lg font-bold tracking-tight text-ink">Le Panier du <span class="text-terracotta-600">coin</span></span>
            </a>

            <nav aria-label="Navigation principale" class="hidden items-center gap-1 text-sm font-medium text-ink/70 md:flex">
                @foreach ($navItems as $item)
                    <a href="{{ route($item['route']) }}"
                       @if ($item['active']) aria-current="page" @endif
                       class="rounded-lg px-3 py-2 {{ $item['active'] ? 'bg-terracotta-50 text-terracotta-700' : 'hover:bg-cream hover:text-ink' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="ml-auto hidden items-center gap-2 md:flex">
                @auth
                    <a href="{{ route('dashboard.buyer') }}" class="rounded-xl bg-terracotta-500 px-4 py-2 text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">Mon compte</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded-xl px-4 py-2 text-sm font-semibold text-ink/80 hover:bg-cream hover:text-ink">Se déconnecter</button>
                    </form>
                    <a href="{{ route('articles.create') }}" class="rounded-xl bg-terracotta-500 px-4 py-2 text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">Publier une annonce</a>
                @else
                    <a href="{{ route('login') }}" class="rounded-xl px-4 py-2 text-sm font-semibold text-ink/80 hover:bg-cream hover:text-ink">Se connecter</a>
                    <a href="{{ route('login') }}" class="rounded-xl bg-terracotta-500 px-4 py-2 text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">Publier une annonce</a>
                @endauth
            </div>

            <button id="menu-btn" type="button" class="ml-auto grid h-10 w-10 place-items-center rounded-xl border border-ink/15 text-ink md:hidden"
                aria-expanded="false" aria-controls="menu-mobile" aria-label="Ouvrir le menu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" class="h-5 w-5"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
            </button>
        </div>

        <nav id="menu-mobile" aria-label="Navigation mobile" class="hidden border-t border-ink/10 bg-paper px-4 pb-4 pt-2 md:hidden">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}"
                   @if ($item['active']) aria-current="page" @endif
                   class="block rounded-lg px-3 py-2.5 font-medium {{ $item['active'] ? 'bg-cream text-terracotta-700' : 'text-ink/75 hover:bg-cream hover:text-ink' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
            <div class="mt-3 flex flex-col gap-2 border-t border-ink/10 pt-3">
                @auth
                    <span class="px-4 py-2.5 text-center text-sm font-semibold text-ink">Mon compte</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full rounded-xl border border-ink/15 px-4 py-2.5 text-center text-sm font-semibold text-ink">Se déconnecter</button>
                    </form>
                    <a href="{{ route('articles.create') }}" class="rounded-xl bg-terracotta-500 px-4 py-2.5 text-center text-sm font-semibold text-paper">Publier une annonce</a>
                @else
                    <a href="{{ route('login') }}" class="rounded-xl border border-ink/15 px-4 py-2.5 text-center text-sm font-semibold text-ink">Se connecter</a>
                    <a href="{{ route('login') }}" class="rounded-xl bg-terracotta-500 px-4 py-2.5 text-center text-sm font-semibold text-paper">Publier une annonce</a>
                @endauth
            </div>
        </nav>
    </header>

    <!-- ================================= Contenu évolutif selon la page ================================= -->
    <main id="contenu">
        @if (session('success'))
            <div class="mx-auto max-w-6xl px-4 pt-4">
                <p role="status" class="rounded-2xl border border-sage-200 bg-sage-50 px-4 py-3 text-sm text-sage-800">
                    {{ session('success') }}
                </p>
            </div>
        @endif

        @if ($errors->any())
            <div class="mx-auto max-w-6xl px-4 pt-4">
                <div role="alert" class="rounded-2xl border border-terracotta-200 bg-terracotta-50 px-4 py-3 text-sm text-terracotta-800">
                    <p class="font-semibold">Merci de corriger les erreurs suivantes :</p>
                    <ul class="mt-1 list-inside list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- ================================= Pied de page ================================= -->
    <footer class="border-t border-ink/10 bg-paper">
        <div class="mx-auto grid max-w-6xl gap-8 px-4 py-12 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <p class="font-display text-base font-bold text-ink">Le Panier du <span class="text-terracotta-600">coin</span></p>
                <p class="mt-3 text-sm leading-relaxed text-ink/60">La brocante communautaire des habitants&nbsp;: vendre, demander et se retrouver près de chez soi.</p>
            </div>
            <nav aria-label="Acheter">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Acheter</p>
                <ul class="mt-3 space-y-2 text-sm text-ink/70">
                    <li><a href="{{ route('articles.index') }}" class="hover:text-terracotta-600">Toutes les annonces</a></li>
                    <li><a href="{{ route('requests.index') }}" class="hover:text-terracotta-600">Demandes ouvertes</a></li>
                    <li><a href="{{ route('requests.create') }}" class="hover:text-terracotta-600">Déposer une demande</a></li>
                </ul>
            </nav>
            <nav aria-label="Vendre">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Vendre</p>
                <ul class="mt-3 space-y-2 text-sm text-ink/70">
                    <li><a href="{{ route('articles.create') }}" class="hover:text-terracotta-600">Publier une annonce</a></li>
                    <li><a href="{{ route('dashboard.buyer') }}" class="hover:text-terracotta-600">Mon tableau de bord</a></li>
                    <li><a href="{{ route('seller') }}" class="hover:text-terracotta-600">Profil &amp; réputation</a></li>
                </ul>
            </nav>
            <nav aria-label="Le projet">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Le projet</p>
                <ul class="mt-3 space-y-2 text-sm text-ink/70">
                    <li><a href="{{ route('about') }}" class="hover:text-terracotta-600">Qui sommes-nous&nbsp;?</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:text-terracotta-600">Conditions d'utilisation</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-terracotta-600">Se connecter</a></li>
                </ul>
            </nav>
        </div>
        <div class="border-t border-ink/10">
            <p class="mx-auto max-w-6xl px-4 py-5 text-xs text-ink/50">© 2026 Le Panier du coin — version maquette, données de démonstration.</p>
        </div>
    </footer>

    <script>
        const menuButton = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('menu-mobile');

        if (menuButton && mobileMenu) {
            menuButton.addEventListener('click', () => {
                const open = mobileMenu.classList.toggle('hidden') === false;
                menuButton.setAttribute('aria-expanded', String(open));
                menuButton.setAttribute('aria-label', open ? 'Fermer le menu' : 'Ouvrir le menu');
            });
        }

        document.addEventListener('click', (event) => {
            const toggle = event.target.closest('[data-toggle-password]');

            if (!toggle) {
                return;
            }

            const input = document.getElementById(toggle.dataset.togglePassword);

            if (!input) {
                return;
            }

            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            toggle.setAttribute('aria-pressed', String(isHidden));
            toggle.setAttribute('aria-label', isHidden ? 'Masquer le mot de passe' : 'Afficher le mot de passe');
        });
    </script>

    @stack('scripts')
</body>
</html>
