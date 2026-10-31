@php
    $isSeller = ($mode ?? 'buyer') === 'seller';
@endphp

<!-- ============================ BANDEAU COMPTE + CHOIX DU MODE ============================ -->
<section class="border-b border-ink/10 bg-paper">
    <div class="mx-auto flex max-w-6xl flex-col gap-5 px-4 py-7 sm:flex-row sm:items-start sm:justify-between">
        <div class="max-w-xl">
            <p class="text-xs font-bold uppercase tracking-[0.15em] text-terracotta-600">Mon compte</p>
            <h1 class="mt-2 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Bonjour {{ Auth::user()->name }}</h1>
            <p class="mt-2 text-sm leading-relaxed text-ink/65 sm:text-base">
                @if ($isSeller)
                    Tu gères tes annonces, tes vues et les messages des acheteurs potentiels.
                @else
                    Tu suis tes achats en cours, ta demande déposée et tes discussions avec les vendeurs.
                @endif
            </p>
        </div>

        <div class="flex flex-col items-start gap-2 sm:items-end">
            <nav aria-label="Choisir le mode du tableau de bord" class="inline-flex items-center gap-1 rounded-2xl border border-ink/10 bg-cream p-1 shadow-soft">
                <a href="{{ route('dashboard.buyer') }}"
                   @if (! $isSeller) aria-current="page" @endif
                   class="rounded-xl px-4 py-2 text-sm font-semibold transition {{ ! $isSeller ? 'bg-sage-500 text-paper shadow-soft' : 'text-ink/60 hover:text-ink' }}">
                    Mode acheteur
                </a>
                <a href="{{ route('dashboard.seller') }}"
                   @if ($isSeller) aria-current="page" @endif
                   class="rounded-xl px-4 py-2 text-sm font-semibold transition {{ $isSeller ? 'bg-terracotta-500 text-paper shadow-soft' : 'text-ink/60 hover:text-ink' }}">
                    Mode vendeur
                </a>
            </nav>
            <p class="text-xs text-ink/55">Bascule entre tes deux rôles, un seul compte suffit</p>
        </div>
    </div>
</section>
