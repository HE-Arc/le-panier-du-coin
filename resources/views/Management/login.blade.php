@extends("layout.app")
@section('title', "Se connecter")
@section("content")
    <div class="mx-auto max-w-md px-4 py-12 sm:py-16">
        <!-- Logo + retour (page centrée) -->
        <div class="mb-8 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
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
                <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 font-semibold text-ink/60 hover:text-terracotta-600">
                    <span aria-hidden="true">←</span> Retour à l'accueil
                </a>
            </p>
        </div>

        <!-- Carte de connexion -->
        <div class="rounded-3xl border border-ink/10 bg-paper p-6 shadow-soft sm:p-8">
            <h1 class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Se connecter</h1>
            <p class="mt-2 text-sm leading-relaxed text-ink/65">Heureux de te revoir&nbsp;! Retrouve tes annonces, tes demandes et tes messages.</p>

            <form method="POST" action="{{ route('login.store') }}" class="mt-6 space-y-5">
                @csrf
                <div>
                    <label for="email" class="mb-1.5 block text-sm font-semibold text-ink">Adresse e-mail</label>
                    <input id="email" name="email" type="email" required autocomplete="email" placeholder="camille@exemple.fr" value="{{ old('email') }}"
                           class="w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/40 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                    @error('email')
                        <p class="mt-1 text-xs text-terracotta-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="mot-de-passe" class="mb-1.5 block text-sm font-semibold text-ink">Mot de passe</label>
                    <div class="relative">
                        <input id="mot-de-passe" name="password" type="password" required autocomplete="current-password" placeholder="Ton mot de passe"
                               class="w-full rounded-xl border border-ink/15 bg-cream py-3 pl-4 pr-12 text-sm text-ink placeholder:text-ink/40 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                        <button type="button" data-toggle-password="mot-de-passe" aria-pressed="false" class="absolute inset-y-0 right-0 grid w-12 place-items-center rounded-r-xl text-ink/50 hover:text-ink"
                                aria-label="Afficher le mot de passe">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5" aria-hidden="true">
                                <path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between gap-3">
                    <label for="rester-connecte" class="flex cursor-pointer items-center gap-2 text-sm text-ink/75">
                        <input id="rester-connecte" name="remember" type="checkbox" value="1"
                               class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                        Rester connecté
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Mot de passe oublié&nbsp;?</a>
                </div>

                <button type="submit" class="w-full rounded-xl bg-terracotta-500 px-6 py-3 text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">
                    Se connecter
                </button>
            </form>

            <p class="mt-6 border-t border-ink/10 pt-5 text-center text-sm text-ink/70">
                Pas encore de compte&nbsp;?
                <a href="{{ route('register') }}" class="font-semibold text-terracotta-600 hover:text-terracotta-700">Créer un compte</a>
            </p>
        </div>

        <p class="mt-6 text-center text-xs text-ink/45">
            <span class="inline-flex items-center gap-1.5">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5" aria-hidden="true">
                    <rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                </svg>
                Protégé par connexion chiffrée
            </span>
        </p>
    </div>
@endsection
