@extends("layout.app")
@section('title', "Mot de passe oublié")
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

        @if(session('status'))
            <p>Lien de réinitialisation envoyé !</p>
        @endif
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

            <form method="POST" action="{{route('password.email')}}" class="mt-6 space-y-5">
                @csrf
                <div>
                    <label for="email" class="mb-1.5 block text-sm font-semibold text-ink">Adresse e-mail</label>
                    <input id="email" name="email" type="email" required autocomplete="email" placeholder="camille@exemple.fr"
                        value="{{old('email')}}"
                        class="w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/40 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                    @error('email')
                        <p>
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <button type="submit" class="w-full rounded-xl bg-terracotta-500 px-6 py-3 text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">
                    Recevoir le lien de réinitialisation
                </button>
            </form>

            <p class="mt-6 border-t border-ink/10 pt-5 text-center text-sm text-ink/70">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 font-semibold text-terracotta-600 hover:text-terracotta-700">
                    <span aria-hidden="true">←</span> Retour à la connexion
                </a>
            </p>
        </div>

        <p class="mt-6 text-center text-sm">
            <a href="{{ route('home') }}" class="font-semibold text-ink/60 hover:text-terracotta-600">Retour à l'accueil</a>
        </p>
    </div>
@endsection
