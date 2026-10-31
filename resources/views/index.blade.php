@extends("layout.app")
@section('title', "Accueil")
@section("content")
    <!-- ============================ HERO ============================ -->
    <section class="relative overflow-hidden">
        <div class="pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
            <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-terracotta-100 blur-3xl opacity-70"></div>
            <div class="absolute -left-20 top-40 h-64 w-64 rounded-full bg-sage-100 blur-3xl opacity-70"></div>
        </div>

        <div class="mx-auto max-w-6xl px-4 pb-14 pt-14 text-center lg:pb-20 lg:pt-24">
            <p class="mx-auto inline-flex items-center gap-2 rounded-full border border-ink/10 bg-paper px-3.5 py-1.5 text-xs font-semibold text-ink/70">
                <span class="h-1.5 w-1.5 rounded-full bg-sage-500" aria-hidden="true"></span>
                Brocante communautaire · Quartier par quartier
            </p>

            <h1 class="mx-auto mt-6 max-w-3xl font-display text-4xl font-bold leading-[1.05] tracking-tight text-ink sm:text-5xl lg:text-6xl">
                Vends, cherche et trouve <span class="text-terracotta-600">au coin de ta rue</span>.
            </h1>
            <p class="mx-auto mt-5 max-w-2xl text-base leading-relaxed text-ink/70 sm:text-lg">
                Le Panier du coin réunit les habitants d'une ville autour d'une brocante vivante&nbsp;:
                mets en vente un objet qui ne te sert plus, ou dépose une demande quand c'est toi qui cherches.
            </p>

            <!-- Barre de recherche -->
            <form action="{{ route('search') }}" method="get" class="mx-auto mt-8 flex max-w-2xl flex-col gap-2 rounded-2xl border border-ink/10 bg-paper p-2 shadow-soft sm:flex-row sm:rounded-full sm:items-center">
                <label for="q" class="sr-only">Que cherches-tu&nbsp;?</label>
                <input id="q" name="q" type="search" placeholder="Vélo, table, jeux de société…"
                       class="w-full rounded-xl border-0 bg-transparent px-4 py-3 text-sm text-ink placeholder:text-ink/45 focus:ring-0 sm:flex-1">
                <label for="categorie" class="sr-only">Catégorie</label>
                <select id="categorie" name="categorie[]" class="rounded-xl border-0 bg-cream px-3 py-3 text-sm text-ink/80 focus:ring-0">
                    <option value="">Toutes catégories</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(in_array($category->id, (array) request('categorie', [])))>{{ $category->title }}</option>
                    @endforeach
                </select>
                <button type="submit" class="rounded-xl bg-terracotta-500 px-6 py-3 text-sm font-semibold text-paper transition hover:bg-terracotta-600">
                    Rechercher
                </button>
            </form>

            <!--TODO: PTE si le temps nous le permet-->
            <div class="mt-4 flex flex-wrap items-center justify-center gap-2 text-xs text-ink/60">
                <span>Populaire&nbsp;:</span>
                <a href="{{ route('search', ['q' => 'vélo de ville']) }}" class="rounded-full border border-ink/10 bg-paper px-2.5 py-1 hover:border-terracotta-300 hover:text-terracotta-600">vélo de ville</a>
                <a href="{{ route('search', ['q' => 'livre scolaire']) }}" class="rounded-full border border-ink/10 bg-paper px-2.5 py-1 hover:border-terracotta-300 hover:text-terracotta-600">livre scolaire</a>
                <a href="{{ route('search', ['q' => 'table basse']) }}" class="rounded-full border border-ink/10 bg-paper px-2.5 py-1 hover:border-terracotta-300 hover:text-terracotta-600">table basse</a>
                <a href="{{ route('search', ['q' => 'machine à café']) }}" class="rounded-full border border-ink/10 bg-paper px-2.5 py-1 hover:border-terracotta-300 hover:text-terracotta-600">machine à café</a>
            </div>

            <!-- Les deux portes d'entrée : acheteur / vendeur -->
            <div class="mx-auto mt-12 grid max-w-3xl gap-4 text-left sm:grid-cols-2">
                <a href="{{ route('search') }}" class="group rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift sm:p-6">
                    <span class="grid h-11 w-11 place-items-center rounded-xl bg-sage-100 text-sage-600" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.2-3.2"/></svg>
                    </span>
                    <h2 class="mt-4 font-display text-lg font-semibold text-ink group-hover:text-terracotta-600">J'achète</h2>
                    <p class="mt-1 text-sm leading-relaxed text-ink/65">Parcourt les annonces autour de toi, filtre par quartier et discute directement avec le vendeur.</p>
                    <span class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-terracotta-600">Trouver un objet <span aria-hidden="true">→</span></span>
                </a>
                @auth
                    <a href="{{ route('articles.create') }}" class="group rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift sm:p-6">
                    <span class="grid h-11 w-11 place-items-center rounded-xl bg-terracotta-100 text-terracotta-600" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"><path d="M12 5v14M5 12h14"/></svg>
                    </span>
                        <h2 class="mt-4 font-display text-lg font-semibold text-ink group-hover:text-terracotta-600">Je vends</h2>
                        <p class="mt-1 text-sm leading-relaxed text-ink/65">Publie une annonce en deux minutes, reçois des messages et construis ta réputation d'habitant fiable.</p>
                        <span class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-terracotta-600">Publier une annonce <span aria-hidden="true">→</span></span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="group rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift sm:p-6">
                    <span class="grid h-11 w-11 place-items-center rounded-xl bg-terracotta-100 text-terracotta-600" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"><path d="M12 5v14M5 12h14"/></svg>
                    </span>
                        <h2 class="mt-4 font-display text-lg font-semibold text-ink group-hover:text-terracotta-600">Je vends</h2>
                        <p class="mt-1 text-sm leading-relaxed text-ink/65">Publie une annonce en deux minutes, reçois des messages et construis ta réputation d'habitant fiable.</p>
                        <span class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-terracotta-600">Publier une annonce <span aria-hidden="true">→</span></span>
                    </a>
                @endauth

            </div>

            <!-- Chiffres clés -->
            <dl class="mx-auto mt-6 grid max-w-3xl grid-cols-2 divide-x divide-ink/10 rounded-2xl border border-ink/10 bg-paper/70 py-5">
                <div class="px-3">
                    <dd class="font-display text-2xl font-bold text-ink sm:text-3xl">{{$nbArticles}}</dd>
                    <dt class="mt-1 text-xs text-ink/60 sm:text-sm">annonces en ligne</dt>
                </div>
                <div class="px-3">
                    <dd class="font-display text-2xl font-bold text-ink sm:text-3xl">{{$nbRequests}}</dd>
                    <dt class="mt-1 text-xs text-ink/60 sm:text-sm">demandes ouvertes</dt>
                </div>
            </dl>
        </div>
    </section>

    <!-- ============================ DERNIÈRES ANNONCES ============================ -->
    <section class="mx-auto max-w-6xl px-4 py-14">
        <div class="flex flex-wrap items-end justify-between gap-3">
            <div>
                <h2 class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Fraîchement déposées</h2>
                <p class="mt-1.5 text-sm text-ink/60">Les derniers objets mis en ligne par les habitants.</p>
            </div>
            <a href="{{ route('search') }}" class="text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Voir toutes les annonces <span aria-hidden="true">→</span></a>
        </div>

        <div class="mt-7 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

            <!-- Carte annonce (modèle pour toutes les pages) -->
            @forelse($newArticles as $newArticle)

                <a href="{{ route('articles.show', $newArticle) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                    <div class="relative grid aspect-[4/3] place-items-center bg-sage-100 text-5xl" aria-hidden="true">🚲
                        <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">{{ $newArticle->category?->title }}</span>
                    </div>
                    <div class="flex flex-1 flex-col p-4">
                        <div class="flex items-start justify-between gap-3">
                            <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">{{ $newArticle->title }}</h3>
                            <p class="shrink-0 font-semibold text-terracotta-600">{{ number_format((float) $newArticle->price, 0, ',', ' ') }}&nbsp;€</p>
                        </div>
                        <p class="mt-1 text-sm text-ink/60">{{ $newArticle->seller?->name }} · {{ $newArticle->location }}</p>
                        <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                            <span class="flex items-center gap-1">
                                {{ $newArticle->condition->label() }}
                            </span>
                            <span>{{ $newArticle->published_at?->diffForHumans() ?? 'non publié' }}</span>
                        </div>
                    </div>
                </a>

            @empty
                <p class="col-span-full rounded-2xl border border-dashed border-ink/15 bg-paper p-10 text-center text-sm text-ink/60">
                    Aucune annonce disponible pour le moment.
                </p>
            @endforelse
        </div>
    </section>

    <!-- ============================ DEMANDES ============================ -->
    <section class="border-y border-ink/10 bg-paper">
        <div class="mx-auto max-w-6xl px-4 py-14">
            <div class="grid gap-8 lg:grid-cols-[1fr_1.4fr] lg:items-center">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.15em] text-sage-600">Vous cherchez&nbsp;?</p>
                    <h2 class="mt-3 font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Dépose une demande, c'est le marché qui vient à toi.</h2>
                    <p class="mt-3 text-sm leading-relaxed text-ink/65 sm:text-base">
                        Pas trouvé ton objet&nbsp;? Décris ce que tu recherches et ton budget&nbsp;: les vendeurs qui ont l'objet sous la main peuvent te répondre spontanément.
                    </p>
                    <div class="mt-5 flex flex-wrap gap-3">
                        <a href="{{ route('requests.index') }}" class="rounded-xl bg-sage-500 px-5 py-2.5 text-sm font-semibold text-paper transition hover:bg-sage-600">Voir les demandes</a>
                        @auth
                            <a href="{{ route('requests.create') }}" class="rounded-xl border border-ink/15 bg-paper px-5 py-2.5 text-sm font-semibold text-ink transition hover:border-ink/30">Déposer une demande</a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-xl border border-ink/15 bg-paper px-5 py-2.5 text-sm font-semibold text-ink transition hover:border-ink/30">Déposer une demande</a>
                        @endauth
                    </div>
                </div>

                <ul class="space-y-3">
                    @forelse($selectionRequests as $selectionRequest)
                        <li class="rounded-2xl border border-ink/10 bg-cream p-4 sm:p-5">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="font-display font-semibold text-ink">{{ $selectionRequest->title }}</h3>
                                <span class="shrink-0 rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">Budget {{ number_format((float) $selectionRequest->budget, 0, ',', ' ') }}&nbsp;€</span>
                            </div>
                            <p class="mt-1.5 text-sm text-ink/60">
                                Cherche avant le {{ $selectionRequest->target_date?->isoFormat('D MMMM') }}
                                · {{ $selectionRequest->location }}
                                @if($selectionRequest->answers_count > 0)
                                    &nbsp;· {{ $selectionRequest->answers_count }} réponse{{ $selectionRequest->answers_count > 1 ? 's' : '' }}
                                @endif
                            </p>
                        </li>
                    @empty
                        <li class="rounded-2xl border border-dashed border-ink/15 bg-paper p-6 text-center text-sm text-ink/60">
                            Aucune demande ouverte pour le moment.
                        </li>
                    @endforelse

                </ul>
            </div>
        </div>
    </section>

    <!-- ============================ COMMENT ÇA MARCHE ============================ -->
    <section class="mx-auto max-w-6xl px-4 py-14">
        <h2 class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Comment ça marche&nbsp;?</h2>
        <ol class="mt-7 grid gap-5 sm:grid-cols-3">
            <li class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft">
                <span class="font-display text-sm font-bold text-terracotta-500">01</span>
                <h3 class="mt-2 font-display font-semibold text-ink">Publie ton objet</h3>
                <p class="mt-1.5 text-sm leading-relaxed text-ink/65">Trois photos, un prix, un quartier. Ton annonce est en ligne immédiatement.</p>
            </li>
            <li class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft">
                <span class="font-display text-sm font-bold text-terracotta-500">02</span>
                <h3 class="mt-2 font-display font-semibold text-ink">Discute en direct</h3>
                <p class="mt-1.5 text-sm leading-relaxed text-ink/65">L'acheteur te contacte sur la messagerie du site&nbsp;: négocie et fixez l'heure.</p>
            </li>
            <li class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft">
                <span class="font-display text-sm font-bold text-terracotta-500">03</span>
                <h3 class="mt-2 font-display font-semibold text-ink">Remise en main propre</h3>
                <p class="mt-1.5 text-sm leading-relaxed text-ink/65">Vous vous croisez dans le quartier, puis tu notes le vendeur&nbsp;: sa réputation fait le reste.</p>
            </li>
        </ol>
    </section>

    <!-- ============================ RÉPUTATION ============================ -->
    <!--TODO: a disctuer si on enlève!!!!-->
    <section class="mx-auto max-w-6xl px-4 pb-16">
        <div class="relative overflow-hidden rounded-3xl bg-sage-700 px-6 py-10 text-center sm:px-12 sm:py-14">
            <p class="text-xs font-bold uppercase tracking-[0.15em] text-sage-200">La réputation fait le marché</p>
            <h2 class="mx-auto mt-4 max-w-2xl font-display text-2xl font-bold tracking-tight text-white sm:text-3xl">
                Chaque vendeur porte ses avis comme un étal bien tenu.
            </h2>
            <div class="mx-auto mt-5 flex max-w-xl items-start gap-3 rounded-2xl bg-white/10 p-4 text-left backdrop-blur">
                <span class="text-amber-300" aria-hidden="true">★★★★★</span>
                <p class="text-sm leading-relaxed text-sage-50/90">
                    «&nbsp;Vendeuse sérieuse, objet conforme et remise au rendez-vous. Je rachèterai les yeux fermés.&nbsp;»
                    <span class="mt-1 block text-xs text-sage-200">— Thomas, à propos de Camille</span>
                </p>
            </div>
            <div class="mt-6">
                <a href="{{ route('seller') }}" class="inline-flex items-center gap-2 rounded-xl bg-paper px-5 py-2.5 text-sm font-semibold text-sage-800 transition hover:bg-cream">
                    Voir un profil vendeur <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </section>
@endsection
