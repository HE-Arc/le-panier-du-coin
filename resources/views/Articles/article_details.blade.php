@extends("layout.app")
@section('title', "Détail de l'annonce")
@section("content")
    <!-- ============================ FIL D'ARIANE ============================ -->
    <nav aria-label="Fil d'Ariane" class="border-b border-ink/10 bg-paper">
        <ol class="mx-auto flex max-w-6xl flex-wrap items-center gap-1.5 px-4 py-3.5 text-xs text-ink/55 sm:text-sm">
            <li><a href="{{ route('home') }}" class="hover:text-terracotta-600">Accueil</a></li>
            <li aria-hidden="true">›</li>
            <li><a href="{{ route('search') }}" class="hover:text-terracotta-600">Annonces</a></li>
            <li aria-hidden="true">›</li>
            <li>
                <a href="{{ route('search', ['categorie' => [$article->category_id]]) }}" class="hover:text-terracotta-600">
                    {{ $article->category?->title }}
                </a>
            </li>
            <li aria-hidden="true">›</li>
            <li aria-current="page" class="font-semibold text-ink/75">
                {{ \Illuminate\Support\Str::limit($article->title, 40) }}
            </li>
        </ol>
    </nav>

    <!-- ============================ FICHE ARTICLE ============================ -->
    <section class="mx-auto max-w-6xl px-4 py-8">
        <div class="grid gap-8 lg:grid-cols-2 lg:items-start">

            <!-- ---------- Colonne gauche : visuels ---------- -->
            <div>
                <figure class="relative">
                    @if ($article->primaryPicture)
                        <img src="{{ asset('storage/' . $article->primaryPicture->image_path) }}"
                             alt="Photo de {{ $article->title }}"
                             class="aspect-[4/3] w-full rounded-3xl border border-ink/10 object-cover shadow-soft">
                    @else
                        <div class="grid aspect-[4/3] place-items-center rounded-3xl border border-ink/10 bg-sage-100 text-[7rem] leading-none shadow-soft"
                             role="img" aria-label="Photo de {{ $article->title }}">
                        </div>
                    @endif
                    <figcaption class="absolute left-4 top-4 rounded-full bg-paper/90 px-3 py-1.5 text-xs font-semibold text-ink/70 shadow-soft">
                        Très bon état
                    </figcaption>
                </figure>

                @if ($article->pictures->isNotEmpty())
                    <div class="mt-4 grid grid-cols-4 gap-3" role="group" aria-label="Autres photos de l'annonce">
                        @foreach ($article->pictures as $picture)
                            <img src="{{ asset('storage/' . $picture->image_path) }}"
                                 alt="Photo {{ $loop->iteration }} de {{ $article->title }}"
                                 class="aspect-square rounded-xl border border-ink/10 object-cover">
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- ---------- Colonne droite : informations ---------- -->
            <div>
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.12em] text-sage-600">{{ $article->category?->title }}</p>
                        <h1 class="mt-2 font-display text-3xl font-bold leading-[1.1] tracking-tight text-ink sm:text-4xl">{{ $article->title }}</h1>
                    </div>
                    <p class="font-display text-3xl font-bold text-terracotta-600">{{ number_format((float) $article->price, 0, ',', ' ') }}&nbsp;€</p>
                </div>

                <p class="mt-3 text-sm text-ink/60">{{ $article->location }} · mis en ligne {{ $article->published_at?->diffForHumans() ?? 'récemment' }}</p>

                <p class="mt-5 text-sm leading-relaxed text-ink/70 sm:text-base">{{ $article->description }}</p>

                <!-- Caractéristiques -->
                <dl class="mt-6 divide-y divide-ink/10 rounded-2xl border border-ink/10 bg-paper text-sm shadow-soft">
                    <div class="flex items-center justify-between gap-4 px-4 py-3">
                        <dt class="text-ink/55">État</dt>
                        <dd class="font-semibold text-ink">{{ $article->condition->label() }}</dd>
                    </div>
                    <div class="flex items-center justify-between gap-4 px-4 py-3">
                        <dt class="text-ink/55">Catégorie</dt>
                        <dd class="font-semibold text-ink">{{ $article->category?->title }}</dd>
                    </div>
                    <div class="flex items-center justify-between gap-4 px-4 py-3">
                        <dt class="text-ink/55">Marque</dt>
                        <dd class="font-semibold text-ink">{{ $article->brand }}</dd>
                    </div>
                    <div class="flex items-center justify-between gap-4 px-4 py-3">
                        <dt class="text-ink/55">Disponibilité</dt>
                        <dd class="font-semibold text-ink">{{ $article->availability }}</dd>
                    </div>
                    <div class="flex items-center justify-between gap-4 px-4 py-3">
                        <dt class="text-ink/55">Négociable</dt>
                        <dd class="font-semibold text-ink">{{ $article->negotiable ? 'Oui' : 'Non' }}</dd>
                    </div>
                    <div class="flex items-center justify-between gap-4 px-4 py-3">
                        <dt class="text-ink/55">Vues</dt>
                        <dd class="font-semibold text-ink">{{ $article->views }}</dd>
                    </div>
                </dl>

                <!-- Vendeur -->
                <div class="mt-6 rounded-2xl border border-ink/10 bg-cream p-4 sm:p-5">
                    <div class="flex items-center gap-4">
                        <span class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-terracotta-100 font-display text-lg font-bold text-terracotta-700" aria-hidden="true">
                            {{ mb_strtoupper(mb_substr($article->seller->name, 0, 1)) }}
                        </span>
                        <div class="min-w-0">
                            <a href="{{ route('seller') }}" class="font-display font-semibold text-ink hover:text-terracotta-600">
                                {{ $article->seller->name }}
                            </a>
                            <p class="text-xs text-ink/60">
                                {{ $article->seller->neighborhood ?? 'Quartier non renseigné' }}
                            </p>
                        </div>
                        <a href="{{ route('seller') }}" class="ml-auto hidden shrink-0 text-sm font-semibold text-terracotta-600 hover:text-terracotta-700 sm:block">
                            Voir le profil <span aria-hidden="true">→</span>
                        </a>
                    </div>

                    <div class="mt-4 flex flex-col gap-2 sm:flex-row">
                        <button type="button" class="rounded-xl bg-terracotta-500 px-5 py-3 text-center text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">
                            Contacter le vendeur
                        </button>
                        <button type="button" class="rounded-xl border border-ink/15 bg-paper px-5 py-3 text-center text-sm font-semibold text-ink transition hover:border-ink/30">
                            Ajouter aux favoris
                        </button>
                    </div>
                </div>

                <!-- TODO: dans la Bdd avoir éventuellement un type de remise d'un articles? -->
                <p class="mt-4 flex items-start gap-2 rounded-xl border border-sage-200 bg-sage-50 px-4 py-3 text-xs leading-relaxed text-sage-700">
                    <span aria-hidden="true">🤝</span>
                    Remise en main propre à {{ $article->location }} uniquement&nbsp;: pas d'envoi postal, pas de paiement en ligne sur le site.
                </p>
            </div>
        </div>
    </section>


    <!-- ============================ DANS LE MÊME QUARTIER ============================ -->
    <section class="mx-auto max-w-6xl px-4 py-12">
        <div class="flex flex-wrap items-end justify-between gap-3">
            <div>
                <h2 class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Dans le même quartier</h2>
                <p class="mt-1.5 text-sm text-ink/60">D'autres objets disponibles au Quartier des Tilleuls.</p>
            </div>
            <!-- TODO: rediriger avec le bon filtre-->
            <a href="{{ route('search') }}" class="text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Voir toutes les annonces <span aria-hidden="true">→</span></a>
        </div>

        <div class="mt-7 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

            <!-- Carte annonce (modèle pour toutes les pages) -->
            <!-- TODO: a récupérer depuis la BDD-->
            <a href="{{ route('articles.show', 1) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                <div class="relative grid aspect-[4/3] place-items-center bg-sky-100 text-5xl" aria-hidden="true">🪑
                    <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Maison</span>
                </div>
                <div class="flex flex-1 flex-col p-4">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Tabouret de bar en bois</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">15&nbsp;€</p>
                    </div>
                    <p class="mt-1 text-sm text-ink/60">Camille · Quartier des Tilleuls</p>
                    <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                        <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,9</span> (23 avis)</span>
                        <span>il y a 1 j</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('articles.show', 1) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                <div class="relative grid aspect-[4/3] place-items-center bg-rose-100 text-5xl" aria-hidden="true">📚
                    <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Livres</span>
                </div>
                <div class="flex flex-1 flex-col p-4">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Romans jeunesse (lot de 12)</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">8&nbsp;€</p>
                    </div>
                    <p class="mt-1 text-sm text-ink/60">Inès · Quartier des Tilleuls</p>
                    <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                        <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,8</span> (14 avis)</span>
                        <span>il y a 2 j</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('articles.show', 1) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                <div class="relative grid aspect-[4/3] place-items-center bg-amber-100 text-5xl" aria-hidden="true">🪴
                    <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Maison</span>
                </div>
                <div class="flex flex-1 flex-col p-4">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Cache-pots en terre cuite (x3)</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">12&nbsp;€</p>
                    </div>
                    <p class="mt-1 text-sm text-ink/60">Karim · Quartier des Tilleuls</p>
                    <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                        <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,7</span> (9 avis)</span>
                        <span>il y a 3 j</span>
                    </div>
                </div>
            </a>

        </div>
    </section>
@endsection
