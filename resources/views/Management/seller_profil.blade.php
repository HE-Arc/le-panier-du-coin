@extends("layout.app")
@section('title', "Profil vendeur")
@section("content")
    <!-- ============================ EN-TÊTE PROFIL ============================ -->
    <!-- TODO: changer avec les infos de la bdd -->
    <section class="border-b border-ink/10 bg-cream">
        <div class="mx-auto max-w-6xl px-4 py-8 sm:py-12">
            <div class="rounded-3xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-8">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex items-start gap-4 sm:gap-5">
                        <span class="grid h-16 w-16 shrink-0 place-items-center rounded-full bg-terracotta-100 font-display text-2xl font-bold text-terracotta-700 sm:h-20 sm:w-20 sm:text-3xl" aria-hidden="true">C</span>
                        <div class="min-w-0">
                            <div class="flex flex-wrap items-center gap-2">
                                <h1 class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Camille</h1>
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">
                                    <span class="text-sage-600" aria-hidden="true">✓</span> Habitant vérifié
                                </span>
                            </div>
                            <p class="mt-1.5 text-sm text-ink/60">Quartier des Tilleuls · Membre depuis mars 2025</p>
                            <p class="mt-3 max-w-md text-sm leading-relaxed text-ink/65">
                                Deux enfants, un atelier au sous-sol et trop de cartons&nbsp;: je vends ce qui ne nous sert plus, en remise directe dans le quartier.
                            </p>
                            <div class="mt-3 flex flex-wrap gap-2 text-xs text-ink/60">
                                <span class="rounded-full border border-ink/10 bg-cream px-2.5 py-1">Répond souvent le soir</span>
                                <span class="rounded-full border border-ink/10 bg-cream px-2.5 py-1">Remise au portail</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 lg:items-end">
                        <div class="rounded-2xl border border-ink/10 bg-cream px-5 py-4 text-center lg:min-w-[13rem]">
                            <p class="flex items-center justify-center gap-2 font-display text-4xl font-bold text-ink">
                                <span class="text-amber-500" aria-hidden="true">★</span>4,9
                                <span class="text-lg font-semibold text-ink/50">/ 5</span>
                            </p>
                            <a href="#avis" class="mt-1 block text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">23 avis</a>
                        </div>
                        <div class="flex flex-col gap-2 sm:flex-row lg:flex-col lg:w-full">
                            <!-- TODO: brancher le contact vendeur quand la messagerie existera. -->
                            <button type="button" class="rounded-xl bg-terracotta-500 px-5 py-3 text-center text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">Contacter</button>
                            <a href="{{ route('search') }}" class="rounded-xl border border-ink/15 bg-paper px-5 py-3 text-center text-sm font-semibold text-ink transition hover:border-ink/30">Voir ses annonces</a>
                        </div>
                    </div>
                </div>

                <!-- Statistiques -->
                <dl class="mt-7 grid grid-cols-2 gap-3 border-t border-ink/10 pt-6 sm:grid-cols-4">
                    <div class="rounded-2xl bg-cream px-3 py-4 text-center">
                        <dd class="font-display text-2xl font-bold text-ink">41</dd>
                        <dt class="mt-1 text-xs text-ink/60">ventes</dt>
                    </div>
                    <div class="rounded-2xl bg-cream px-3 py-4 text-center">
                        <dd class="font-display text-2xl font-bold text-ink">~ 2 h</dd>
                        <dt class="mt-1 text-xs text-ink/60">temps de réponse</dt>
                    </div>
                    <div class="rounded-2xl bg-cream px-3 py-4 text-center">
                        <dd class="font-display text-2xl font-bold text-ink">96 %</dd>
                        <dt class="mt-1 text-xs text-ink/60">de réponses</dt>
                    </div>
                    <div class="rounded-2xl bg-cream px-3 py-4 text-center">
                        <dd class="font-display text-2xl font-bold text-ink">100 %</dd>
                        <dt class="mt-1 text-xs text-ink/60">de remises tenues</dt>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <!-- ============================ ONGLETS ============================ -->
    <!-- TODO: changer avec les infos de la bdd -->
    <section class="mx-auto max-w-6xl px-4 pt-8">
        <div role="tablist" aria-label="Sections du profil" class="flex gap-1 border-b border-ink/10">
            <a href="{{ route('seller') }}" role="tab" aria-selected="true" aria-current="page"
               class="rounded-t-lg border-b-2 border-terracotta-500 px-4 py-3 text-sm font-semibold text-terracotta-700">
                Ses annonces (6)
            </a>
            <a href="#avis" role="tab" aria-selected="false"
               class="rounded-t-lg border-b-2 border-transparent px-4 py-3 text-sm font-medium text-ink/60 hover:text-ink">
                Ses avis (23)
            </a>
        </div>
    </section>

    <!-- ============================ ANNONCES ============================ -->
    <!-- TODO: changer avec les infos de la bdd -->
    <section class="mx-auto max-w-6xl px-4 py-8">
        <h2 class="sr-only">Les annonces de Camille</h2>
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

            <!-- Carte annonce (modèle accueil) -->
            <a href="{{ route('articles.show', 1) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                <div class="relative grid aspect-[4/3] place-items-center bg-sage-100 text-5xl" aria-hidden="true">🚲
                    <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Vélos</span>
                </div>
                <div class="flex flex-1 flex-col p-4">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Vélo de ville — 3 vitesses</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">45&nbsp;€</p>
                    </div>
                    <p class="mt-1 text-sm text-ink/60">Camille · Quartier des Tilleuls</p>
                    <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                        <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,9</span> (23 avis)</span>
                        <span>il y a 2 h</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('articles.show', 1) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                <div class="relative grid aspect-[4/3] place-items-center bg-terracotta-100 text-5xl" aria-hidden="true">🛋️
                    <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Maison</span>
                </div>
                <div class="flex flex-1 flex-col p-4">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Canapé 3 places en tissu gris</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">120&nbsp;€</p>
                    </div>
                    <p class="mt-1 text-sm text-ink/60">Camille · Quartier des Tilleuls</p>
                    <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                        <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,9</span> (23 avis)</span>
                        <span>hier</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('articles.show', 1) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                <div class="relative grid aspect-[4/3] place-items-center bg-amber-100 text-5xl" aria-hidden="true">🎲
                    <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Loisirs</span>
                </div>
                <div class="flex flex-1 flex-col p-4">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Coffret de 5 jeux de société</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">18&nbsp;€</p>
                    </div>
                    <p class="mt-1 text-sm text-ink/60">Camille · Quartier des Tilleuls</p>
                    <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                        <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,9</span> (23 avis)</span>
                        <span>il y a 3 j</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('articles.show', 1) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                <div class="relative grid aspect-[4/3] place-items-center bg-sky-100 text-5xl" aria-hidden="true">🧇
                    <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Électroménager</span>
                </div>
                <div class="flex flex-1 flex-col p-4">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Robot pâtissier — bol inox</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">45&nbsp;€</p>
                    </div>
                    <p class="mt-1 text-sm text-ink/60">Camille · Quartier des Tilleuls</p>
                    <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                        <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,9</span> (23 avis)</span>
                        <span>il y a 4 j</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('articles.show', 1) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                <div class="relative grid aspect-[4/3] place-items-center bg-rose-100 text-5xl" aria-hidden="true">📚
                    <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Livres</span>
                </div>
                <div class="flex flex-1 flex-col p-4">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Manuels de terminale (lot de 8)</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">25&nbsp;€</p>
                    </div>
                    <p class="mt-1 text-sm text-ink/60">Camille · Quartier des Tilleuls</p>
                    <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                        <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,9</span> (23 avis)</span>
                        <span>il y a 6 j</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('articles.show', 1) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                <div class="relative grid aspect-[4/3] place-items-center bg-violet-100 text-5xl" aria-hidden="true">🧸
                    <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Enfants</span>
                </div>
                <div class="flex flex-1 flex-col p-4">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Toboggan de jardin pliant</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">30&nbsp;€</p>
                    </div>
                    <p class="mt-1 text-sm text-ink/60">Camille · Quartier des Tilleuls</p>
                    <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                        <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,9</span> (23 avis)</span>
                        <span>il y a 1 j</span>
                    </div>
                </div>
            </a>

        </div>
    </section>

    <!-- ============================ AVIS ============================ -->
    <section id="avis" class="mx-auto max-w-6xl px-4 pb-10 pt-6">
        <div class="flex flex-wrap items-end justify-between gap-3">
            <div>
                <h2 class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Ce qu'en disent les acheteurs</h2>
                <p class="mt-1.5 text-sm text-ink/60">23 avis, tous liés à une vente réelle.</p>
            </div>
            <a href="#avis" class="text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Voir les 23 avis <span aria-hidden="true">→</span></a>
        </div>

        <ul class="mt-7 grid gap-5 sm:grid-cols-2">
            <li class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft">
                <div class="flex items-center justify-between gap-3">
                    <span class="text-amber-500" aria-hidden="true">★★★★★</span>
                    <span class="text-xs text-ink/55">Il y a 2 semaines</span>
                </div>
                <p class="mt-3 text-sm leading-relaxed text-ink/70">
                    «&nbsp;Vendeuse sérieuse, objet conforme et remise au rendez-vous. Je rachèterai les yeux fermés.&nbsp;»
                </p>
                <p class="mt-3 text-sm font-semibold text-ink">Thomas</p>
            </li>

            <li class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft">
                <div class="flex items-center justify-between gap-3">
                    <span class="text-amber-500" aria-hidden="true">★★★★★</span>
                    <span class="text-xs text-ink/55">Il y a 3 semaines</span>
                </div>
                <p class="mt-3 text-sm leading-relaxed text-ink/70">
                    «&nbsp;Le canapé était impeccable, elle a même attendu que je vienne avec la voiture. Message réponse en moins d'une heure.&nbsp;»
                </p>
                <p class="mt-3 text-sm font-semibold text-ink">Nadia</p>
            </li>

            <li class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft">
                <div class="flex items-center justify-between gap-3">
                    <span class="text-amber-500" aria-hidden="true">★★★★<span class="text-ink/30">★</span></span>
                    <span class="text-xs text-ink/55">Il y a 1 mois</span>
                </div>
                <p class="mt-3 text-sm leading-relaxed text-ink/70">
                    «&nbsp;Vélo vendu 45 €, parfait pour aller à la gare. Un petit retard au rendez-vous mais elle m'a prévenu à l'avance.&nbsp;»
                </p>
                <p class="mt-3 text-sm font-semibold text-ink">Hugo</p>
            </li>

            <li class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft">
                <div class="flex items-center justify-between gap-3">
                    <span class="text-amber-500" aria-hidden="true">★★★★★</span>
                    <span class="text-xs text-ink/55">Il y a 2 mois</span>
                </div>
                <p class="mt-3 text-sm leading-relaxed text-ink/70">
                    «&nbsp;Les manuels étaient annotés mais complets, et elle a ajouté un cahier de chimie pour le prix.&nbsp;»
                </p>
                <p class="mt-3 text-sm font-semibold text-ink">Léa</p>
            </li>
        </ul>

        <div class="mt-7 flex justify-center">
            <a href="#avis" class="rounded-xl border border-ink/15 bg-paper px-6 py-3 text-sm font-semibold text-ink transition hover:border-ink/30 hover:bg-cream">
                Voir les 23 avis
            </a>
        </div>
    </section>

    <!-- ============================ RÉPUTATION ============================ -->
    <section class="mx-auto max-w-6xl px-4 pb-16">
        <div class="relative overflow-hidden rounded-3xl bg-sage-700 px-6 py-10 text-center sm:px-12 sm:py-14">
            <p class="text-xs font-bold uppercase tracking-[0.15em] text-sage-200">La réputation fait le marché</p>
            <h2 class="mx-auto mt-4 max-w-2xl font-display text-2xl font-bold tracking-tight text-white sm:text-3xl">
                Chaque avis est lié à une transaction réelle.
            </h2>
            <div class="mx-auto mt-5 flex max-w-xl items-start gap-3 rounded-2xl bg-white/10 p-4 text-left backdrop-blur">
                <span class="text-amber-300" aria-hidden="true">★★★★★</span>
                <p class="text-sm leading-relaxed text-sage-50/90">
                    «&nbsp;Une note ne peut être déposée qu'après une vente confirmée&nbsp;: pas d'avis acheté, pas d'avis inventé.&nbsp;»
                    <span class="mt-1 block text-xs text-sage-200">— L'équipe du Panier du coin</span>
                </p>
            </div>
            <div class="mt-6 flex flex-wrap justify-center gap-3">
                <a href="{{ route('articles.create') }}" class="rounded-xl bg-paper px-5 py-2.5 text-sm font-semibold text-sage-800 transition hover:bg-cream">
                    Publier à mon tour
                </a>
                <a href="{{ route('requests.index') }}" class="rounded-xl border border-white/25 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-white/10">
                    Voir les demandes ouvertes
                </a>
            </div>
        </div>
    </section>
@endsection
