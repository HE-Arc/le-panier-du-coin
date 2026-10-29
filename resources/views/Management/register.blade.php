@extends("layout.app")
@section('title', "Créer mon compte")
@section("content")
    <div class="mx-auto max-w-lg px-4 py-12 sm:py-16">
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

        <!-- Carte d'inscription -->
        <div class="rounded-3xl border border-ink/10 bg-paper p-6 shadow-soft sm:p-8">
            <h1 class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Créer mon compte</h1>
            <p class="mt-2 text-sm leading-relaxed text-ink/65">Rejoins les habitants qui font vivre la brocante du quartier&nbsp;: vends, cherche et discute près de chez toi.</p>

            <form method="POST" action="{{ route('register.store') }}" class="mt-6 space-y-5">
                @csrf
                <div>
                    <label for="nom" class="mb-1.5 block text-sm font-semibold text-ink">Nom complet</label>
                    <input id="nom" name="name" type="text" required autocomplete="name" placeholder="Camille Dupont" value="{{ old('name') }}"
                           class="w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/40 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                    @error('name')
                        <p class="mt-1 text-xs text-terracotta-600">{{ $message }}</p>
                    @enderror
                </div>

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
                        <input id="mot-de-passe" name="password" type="password" required autocomplete="new-password" placeholder="8 caractères minimum"
                               class="w-full rounded-xl border border-ink/15 bg-cream py-3 pl-4 pr-12 text-sm text-ink placeholder:text-ink/40 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                        @error('password')
                            <p class="mt-1 text-xs text-terracotta-600">{{ $message }}</p>
                        @enderror
                        <button type="button" data-toggle-password="mot-de-passe" aria-pressed="false" class="absolute inset-y-0 right-0 grid w-12 place-items-center rounded-r-xl text-ink/50 hover:text-ink"
                                aria-label="Afficher le mot de passe">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5" aria-hidden="true">
                                <path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Règles du mot de passe (état statique pour la maquette) -->
                    <ul class="mt-3 space-y-1.5 text-xs text-ink/65">
                        <li class="flex items-center gap-2 text-sage-700">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5 shrink-0 text-sage-500" aria-hidden="true"><path d="m5 13 4 4L19 7"/></svg>
                            8 caractères minimum
                            <span class="sr-only">— règle remplie</span>
                        </li>
                        <li class="flex items-center gap-2 text-sage-700">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5 shrink-0 text-sage-500" aria-hidden="true"><path d="m5 13 4 4L19 7"/></svg>
                            Une lettre majuscule
                            <span class="sr-only">— règle remplie</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-3.5 w-3.5 shrink-0 text-ink/35" aria-hidden="true"><circle cx="12" cy="12" r="8"/></svg>
                            Au moins un chiffre
                            <span class="sr-only">— règle non remplie</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <label for="confirmation" class="mb-1.5 block text-sm font-semibold text-ink">Confirme le mot de passe</label>
                    <input id="confirmation" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="Retape ton mot de passe"
                           class="w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/40 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                    @error('password_confirmation')
                        <p class="mt-1 text-xs text-terracotta-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="conditions" class="flex cursor-pointer items-start gap-2.5 text-sm text-ink/75">
                        <input id="conditions" name="conditions" type="checkbox" value="1" required
                               class="mt-0.5 h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                        @error('conditions')
                            <p class="mt-1 text-xs text-terracotta-600">{{ $message }}</p>
                        @enderror
                        <span>J'accepte les <a href="{{ route('terms') }}" class="font-semibold text-terracotta-600 underline-offset-2 hover:underline">conditions d'utilisation</a> et la politique de confidentialité.</span>
                    </label>
                </div>

                <button type="submit" class="w-full rounded-xl bg-terracotta-500 px-6 py-3 text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">
                    Créer mon compte
                </button>
            </form>

            <p class="mt-6 border-t border-ink/10 pt-5 text-center text-sm text-ink/70">
                Déjà inscrit&nbsp;?
                <a href="{{ route('login') }}" class="font-semibold text-terracotta-600 hover:text-terracotta-700">Se connecter</a>
            </p>
        </div>
    </div>
@endsection
