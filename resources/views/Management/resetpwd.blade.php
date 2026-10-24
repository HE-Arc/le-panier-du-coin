<!-- TODO: A adapter dans le futur selon les modèles et controleur-->
@extends("layout.app")
@section("content")
    <!-- Logo + retour (page centrée) -->
    <div class="mb-8 text-center">
        <a href="accueil.html" class="inline-flex items-center gap-2">
            <span class="grid h-11 w-11 place-items-center rounded-2xl bg-terracotta-100 text-terracotta-600" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                    <path d="M3 8h18l-1.6 9.2a2 2 0 0 1-2 1.8H6.6a2 2 0 0 1-2-1.8L3 8Z"/>
                    <path d="M8 8 10 3M16 8 14 3"/>
                    <path d="M9.5 12v3M14.5 12v3"/>
                </svg>
            </span>
            <span class="font-display text-xl font-bold tracking-tight text-ink">Le Panier du <span class="text-terracotta-600">coin</span></span>
        </a>
        <p class="mt-4 text-sm">
            <a href="accueil.html" class="inline-flex items-center gap-1.5 font-semibold text-ink/60 hover:text-terracotta-600">
                <span aria-hidden="true">←</span> Retour à l'accueil
            </a>
        </p>
    </div>

    <!-- Carte de réinitialisation -->
    <div class="rounded-3xl border border-ink/10 bg-paper p-6 shadow-soft sm:p-8">
        <span class="grid h-11 w-11 place-items-center rounded-xl bg-sage-100 text-sage-600" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                <rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/>
            </svg>
        </span>

        <h1 class="mt-4 font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Mot de passe oublié&nbsp;?</h1>
        <p class="mt-2 text-sm leading-relaxed text-ink/65">
            Pas de panique&nbsp;! Indique l'adresse e-mail utilisée lors de ton inscription&nbsp;:
            nous t'enverrons un lien pour choisir un nouveau mot de passe.
        </p>

        <form action="mot-de-passe-oublie.html" method="get" class="mt-6 space-y-5">
            <div>
                <label for="email" class="mb-1.5 block text-sm font-semibold text-ink">Adresse e-mail</label>
                <input id="email" name="email" type="email" required autocomplete="email" placeholder="camille@exemple.fr"
                       class="w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/40 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
            </div>

            <button type="submit" class="w-full rounded-xl bg-terracotta-500 px-6 py-3 text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">
                Recevoir le lien de réinitialisation
            </button>
        </form>

        <!-- État de confirmation (affiché pour la démonstration) -->
        <div role="status" class="mt-6 flex items-start gap-3 rounded-2xl border border-sage-200 bg-sage-50 p-4">
            <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-sage-500 text-xs font-bold text-white" aria-hidden="true">✓</span>
            <p class="text-sm leading-relaxed text-sage-800">
                Si un compte existe avec cet email, un lien de réinitialisation vient d'être envoyé. Vérifie aussi tes spams.
            </p>
        </div>

        <p class="mt-6 border-t border-ink/10 pt-5 text-center text-sm text-ink/70">
            <a href="login.html" class="inline-flex items-center gap-1.5 font-semibold text-terracotta-600 hover:text-terracotta-700">
                <span aria-hidden="true">←</span> Retour à la connexion
            </a>
        </p>
    </div>

    <p class="mt-6 text-center text-sm">
        <a href="accueil.html" class="font-semibold text-ink/60 hover:text-terracotta-600">Retour à l'accueil</a>
    </p>
@endsection
