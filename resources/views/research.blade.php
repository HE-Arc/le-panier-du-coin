@extends("layout.app")
@section('title', "Recherche d'annonces")
@section("content")
    <!-- ============================ TÊTE DE PAGE ============================ -->
    <section class="border-b border-ink/10 bg-paper">
        <div class="mx-auto max-w-6xl px-4 py-8 sm:py-10">
            <nav aria-label="Fil d'Ariane" class="text-xs text-ink/55">
                <ol class="flex flex-wrap items-center gap-1.5">
                    <li><a href="{{ route('home') }}" class="hover:text-terracotta-600">Accueil</a></li>
                    <li aria-hidden="true">›</li>
                    <li aria-current="page" class="font-semibold text-ink/75">Annonces</li>
                </ol>
            </nav>

            <h1 class="mt-3 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Recherche d'annonces</h1>

            <!--TODO: à adapter les filtre selon la bdd-->
            <form action="{{ route('search') }}" method="get" class="mt-5 flex max-w-2xl flex-col gap-2 sm:flex-row">
                <label for="q" class="sr-only">Que cherches-tu&nbsp;?</label>
                <input id="q" name="q" type="search" value="{{ request('q') }}"
                       placeholder="Vélo, table, jeux de société…"
                       class="w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200 sm:flex-1">
                <button type="submit" class="rounded-xl bg-terracotta-500 px-6 py-3 text-sm font-semibold text-paper transition hover:bg-terracotta-600">
                    Rechercher
                </button>
            </form>

            <p class="mt-4 text-sm text-ink/65" role="status">
                <strong class="font-display text-base text-ink">{{ $articles->total() }} annonce{{ $articles->total() > 1 ? 's' : '' }}</strong>
                @if (request('q'))
                    pour «&nbsp;{{ request('q') }}&nbsp;»
                @endif
            </p>
        </div>
    </section>

    <!-- ============================ FILTRES + RÉSULTATS ============================ -->
    <section class="mx-auto max-w-6xl px-4 py-8">
        <div class="grid gap-6 lg:grid-cols-[270px_1fr] lg:items-start">

            <!-- ---------- Filtres (au-dessus des résultats en mobile, colonne sticky en lg) ---------- -->
            <aside aria-label="Filtres de recherche" class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft lg:sticky lg:top-24">
                <div class="flex items-center justify-between gap-3">
                    <h2 class="font-display text-lg font-semibold text-ink">Filtres</h2>
                    <a href="{{ route('search') }}" class="text-xs font-semibold text-terracotta-600 hover:text-terracotta-700">Réinitialiser</a>
                </div>

                <!--TODO: Appliquer de filtre dynamique selon les selection de l'utilisateur????-->
                <form action="{{ route('search') }}" method="get" class="mt-5 space-y-6">
                    <input type="hidden" name="q" value="{{ request('q') }}">
                    <input type="hidden" name="tri" value="{{ request('tri', 'pertinence') }}">

                    <!-- Catégorie -->
                    <fieldset>
                        <legend class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Catégorie</legend>
                        <div class="mt-3 space-y-2.5">
                            @forelse ($categories as $category)
                                <label class="flex items-center gap-2.5 text-sm text-ink/75">
                                    <input type="checkbox" name="categorie[]" value="{{ $category->id }}"
                                           @checked(in_array($category->id, (array) request('categorie', [])))
                                           class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                                    {{ $category->title }}
                                    <span class="text-ink/45">({{ $category->articles_count }})</span>
                                </label>
                            @empty
                                <p class="text-sm text-ink/50">Aucune catégorie disponible.</p>
                            @endforelse
                        </div>
                    </fieldset>

                    <!-- Prix -->
                    <fieldset>
                        <legend class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Prix (€)</legend>
                        <div class="mt-3 grid grid-cols-2 gap-3">
                            <div>
                                <label for="prix-min" class="block text-sm text-ink/70">Min.</label>
                                <input id="prix-min" name="prix_min" type="number" inputmode="numeric" min="0"
                                       value="{{ request('prix_min') }}"
                                       placeholder="{{ $priceRanges?->min_price !== null ? (int) $priceRanges->min_price : 0 }}"
                                       class="mt-1 w-full rounded-xl border border-ink/15 bg-cream px-3 py-2 text-sm text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                            </div>
                            <div>
                                <label for="prix-max" class="block text-sm text-ink/70">Max.</label>
                                <input id="prix-max" name="prix_max" type="number" inputmode="numeric" min="0"
                                       value="{{ request('prix_max') }}"
                                       placeholder="{{ $priceRanges?->max_price !== null ? (int) $priceRanges->max_price : 200 }}"
                                       class="mt-1 w-full rounded-xl border border-ink/15 bg-cream px-3 py-2 text-sm text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                            </div>
                        </div>
                    </fieldset>

                    <!-- Quartier -->
                    <div>
                        <label for="quartier" class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Quartier</label>
                        <select id="quartier" name="quartier"
                                class="mt-3 w-full rounded-xl border border-ink/15 bg-cream px-3 py-2.5 text-sm text-ink/80 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                            <option value="">Tous les quartiers</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location }}" @selected(request('quartier') === $location)>
                                    {{ $location }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- État -->
                    <fieldset>
                        <legend class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">État</legend>
                        <div class="mt-3 space-y-2.5">
                            @foreach ($conditions as $condition)
                                <label class="flex items-center gap-2.5 text-sm text-ink/75">
                                    <input type="checkbox" name="etat[]" value="{{ $condition->value }}"
                                           @checked(in_array($condition->value, (array) request('etat', [])))
                                           class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                                    {{ $condition->label() }}
                                </label>
                            @endforeach
                        </div>
                    </fieldset>

                    <div class="flex items-center justify-between gap-3 border-t border-ink/10 pt-4">
                        <button type="submit" class="rounded-xl bg-terracotta-500 px-5 py-2.5 text-sm font-semibold text-paper transition hover:bg-terracotta-600">Appliquer</button>
                        <a href="{{ route('search') }}" class="text-sm font-semibold text-ink/60 hover:text-terracotta-600">Réinitialiser</a>
                    </div>
                </form>
            </aside>

            <!-- ---------- Résultats ---------- -->
            <div>
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <p class="text-sm text-ink/60">
                        <strong class="font-semibold text-ink/80">{{ $articles->total() }} annonce{{ $articles->total() > 1 ? 's' : '' }}</strong>
                        @if (request('q'))
                            pour «&nbsp;{{ request('q') }}&nbsp;»
                        @endif
                    </p>
                    <!--TODO: applique des filtre (controleur ->model ->controleur -> view) -->
                    <form action="{{ route('search') }}" method="get" class="flex items-center gap-2">
                        <input type="hidden" name="q" value="{{ request('q') }}">
                        <label for="tri" class="text-sm text-ink/60">Trier par</label>
                        <select id="tri" name="tri" onchange="this.form.submit()" class="rounded-xl border border-ink/15 bg-cream px-3 py-2 text-sm text-ink/80 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                            <option value="pertinence" @selected(request('tri', 'pertinence') === 'pertinence')>Pertinence</option>
                            <option value="prix" @selected(request('tri') === 'prix')>Prix croissant</option>
                            <option value="recent" @selected(request('tri') === 'recent')>Plus récentes</option>
                        </select>
                    </form>
                </div>

                <div class="mt-5 grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
                    @forelse ($articles as $article)
                        <a href="{{ route('articles.show', $article) }}"
                           class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                            <div class="relative grid aspect-[4/3] place-items-center text-5xl" aria-hidden="true">
                                <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">
                                    {{ $article->category?->title }}
                                </span>
                            </div>
                            <div class="flex flex-1 flex-col p-4">
                                <div class="flex items-start justify-between gap-3">
                                    <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">
                                        {{ $article->title }}
                                    </h3>
                                    <p class="shrink-0 font-semibold text-terracotta-600">
                                        {{ number_format((float) $article->price, 0, ',', ' ') }}&nbsp;€
                                    </p>
                                </div>
                                <p class="mt-1 text-sm text-ink/60">{{ $article->seller?->name }} · {{ $article->location }}</p>
                                <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                                    <span class="text-ink/50">{{ $article->condition->label() }}</span>
                                    <span>{{ $article->published_at?->diffForHumans() ?? 'non publié' }}</span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="col-span-full rounded-2xl border border-dashed border-ink/15 bg-paper p-10 text-center text-sm text-ink/60">
                            Aucune annonce disponible pour le moment.
                        </p>
                    @endforelse
                </div>

                <!-- ---------- Pagination ---------- -->
                <div class="mt-8">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
