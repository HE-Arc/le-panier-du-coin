@extends("layout.app")
@section('title', "Réinitaliser le mot de passe")
@section("content")
<div class="mx-auto max-w-md px-4 py-12 sm:py-16">
  <div class="rounded-3xl border border-ink/10 bg-paper p-6 shadow-soft sm:p-8">
    <h1 class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Nouveau mot de passe</h1>

    @if (session('status'))
      <div role="status" class="mt-4 rounded-2xl border border-sage-200 bg-sage-50 p-4 text-sm text-sage-800">
        {{ session('status') }}
      </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-5">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">

      <div>
        <label for="email" class="mb-1.5 block text-sm font-semibold text-ink">Adresse e-mail</label>
        <input id="email" name="email" type="email" required autocomplete="email"
               value="{{ old('email') }}"
               class="w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink ...">
        <p class="mt-1 text-xs text-ink/50">Utilise l'adresse e-mail du compte pour lequel tu as demandé le lien.</p>
        @error('email')
          <p class="mt-1 text-xs text-terracotta-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password" class="mb-1.5 block text-sm font-semibold text-ink">Nouveau mot de passe</label>
        <input id="password" name="password" type="password" required autocomplete="new-password"
               class="w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink ...">
        @error('password')
          <p class="mt-1 text-xs text-terracotta-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password_confirmation" class="mb-1.5 block text-sm font-semibold text-ink">Confirmer</label>
        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
               class="w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink ...">
      </div>

      <button type="submit" class="w-full rounded-xl bg-terracotta-500 px-6 py-3 text-sm font-semibold text-paper ...">
        Réinitialiser le mot de passe
      </button>
    </form>
  </div>
</div>
@endsection
