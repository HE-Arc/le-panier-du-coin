<!-- TODO: A adapter dans le futur selon les modèles et controleur-->
@extends("layout.app")
@section("content")
    <!-- ============================ TÊTE DE PAGE ============================ -->
    <section class="border-b border-ink/10 bg-paper">
        <div class="mx-auto max-w-6xl px-4 py-8 sm:py-10">
            <nav aria-label="Fil d'Ariane" class="text-xs text-ink/55">
                <ol class="flex flex-wrap items-center gap-1.5">
                    <li><a href="accueil.html" class="hover:text-terracotta-600">Accueil</a></li>
                    <li aria-hidden="true">›</li>
                    <li aria-current="page" class="font-semibold text-ink/75">Annonces</li>
                </ol>
            </nav>

            <h1 class="mt-3 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Recherche d'annonces</h1>

            <form action="recherche.html" method="get" class="mt-5 flex max-w-2xl flex-col gap-2 sm:flex-row">
                <label for="q" class="sr-only">Que cherches-tu&nbsp;?</label>
                <input id="q" name="q" type="search" value="vélo"
                       placeholder="Vélo, table, jeux de société…"
                       class="w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200 sm:flex-1">
                <button type="submit" class="rounded-xl bg-terracotta-500 px-6 py-3 text-sm font-semibold text-paper transition hover:bg-terracotta-600">
                    Rechercher
                </button>
            </form>

            <p class="mt-4 text-sm text-ink/65" role="status"><strong class="font-display text-base text-ink">27 annonces</strong> pour «&nbsp;vélo&nbsp;»</p>
        </div>
    </section>

    <!-- ============================ FILTRES + RÉSULTATS ============================ -->
    <section class="mx-auto max-w-6xl px-4 py-8">
        <div class="grid gap-6 lg:grid-cols-[270px_1fr] lg:items-start">

            <!-- ---------- Filtres (au-dessus des résultats en mobile, colonne sticky en lg) ---------- -->
            <aside aria-label="Filtres de recherche" class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft lg:sticky lg:top-24">
                <div class="flex items-center justify-between gap-3">
                    <h2 class="font-display text-lg font-semibold text-ink">Filtres</h2>
                    <a href="recherche.html" class="text-xs font-semibold text-terracotta-600 hover:text-terracotta-700">Réinitialiser</a>
                </div>

                <form action="recherche.html" method="get" class="mt-5 space-y-6">

                    <!-- Catégorie -->
                    <fieldset>
                        <legend class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Catégorie</legend>
                        <div class="mt-3 space-y-2.5">
                            <label class="flex items-center gap-2.5 text-sm text-ink/75">
                                <input type="checkbox" name="categorie" value="velos" checked class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                                Vélos &amp; vélocipédie <span class="text-ink/45">(27)</span>
                            </label>
                            <label class="flex items-center gap-2.5 text-sm text-ink/75">
                                <input type="checkbox" name="categorie" value="maison" class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                                Maison &amp; meubles <span class="text-ink/45">(64)</span>
                            </label>
                            <label class="flex items-center gap-2.5 text-sm text-ink/75">
                                <input type="checkbox" name="categorie" value="loisirs" class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                                Loisirs &amp; jeux <span class="text-ink/45">(31)</span>
                            </label>
                            <label class="flex items-center gap-2.5 text-sm text-ink/75">
                                <input type="checkbox" name="categorie" value="electromenager" class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                                Électroménager <span class="text-ink/45">(22)</span>
                            </label>
                            <label class="flex items-center gap-2.5 text-sm text-ink/75">
                                <input type="checkbox" name="categorie" value="vetements" class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                                Vêtements <span class="text-ink/45">(45)</span>
                            </label>
                        </div>
                    </fieldset>

                    <!-- Prix -->
                    <fieldset>
                        <legend class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Prix (€)</legend>
                        <div class="mt-3 grid grid-cols-2 gap-3">
                            <div>
                                <label for="prix-min" class="block text-sm text-ink/70">Min.</label>
                                <input id="prix-min" name="prix_min" type="number" inputmode="numeric" min="0" placeholder="0"
                                       class="mt-1 w-full rounded-xl border border-ink/15 bg-cream px-3 py-2 text-sm text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                            </div>
                            <div>
                                <label for="prix-max" class="block text-sm text-ink/70">Max.</label>
                                <input id="prix-max" name="prix_max" type="number" inputmode="numeric" min="0" placeholder="200"
                                       class="mt-1 w-full rounded-xl border border-ink/15 bg-cream px-3 py-2 text-sm text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                            </div>
                        </div>
                    </fieldset>

                    <!-- Quartier -->
                    <div>
                        <label for="quartier" class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Quartier</label>
                        <select id="quartier" name="quartier" class="mt-3 w-full rounded-xl border border-ink/15 bg-cream px-3 py-2.5 text-sm text-ink/80 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                            <option value="">Tous les quartiers</option>
                            <option>Centre-ville</option>
                            <option>Quartier des Tilleuls</option>
                            <option>Faubourg Nord</option>
                            <option>Rue des Écoles</option>
                        </select>
                    </div>

                    <!-- État -->
                    <fieldset>
                        <legend class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">État</legend>
                        <div class="mt-3 space-y-2.5">
                            <label class="flex items-center gap-2.5 text-sm text-ink/75">
                                <input type="checkbox" name="etat" value="neuf" class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                                Neuf
                            </label>
                            <label class="flex items-center gap-2.5 text-sm text-ink/75">
                                <input type="checkbox" name="etat" value="tres-bon" checked class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                                Très bon
                            </label>
                            <label class="flex items-center gap-2.5 text-sm text-ink/75">
                                <input type="checkbox" name="etat" value="correct" class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                                Correct
                            </label>
                        </div>
                    </fieldset>

                    <div class="flex items-center justify-between gap-3 border-t border-ink/10 pt-4">
                        <button type="submit" class="rounded-xl bg-terracotta-500 px-5 py-2.5 text-sm font-semibold text-paper transition hover:bg-terracotta-600">Appliquer</button>
                        <a href="recherche.html" class="text-sm font-semibold text-ink/60 hover:text-terracotta-600">Réinitialiser</a>
                    </div>
                </form>
            </aside>

            <!-- ---------- Résultats ---------- -->
            <div>
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <p class="text-sm text-ink/60"><strong class="font-semibold text-ink/80">27 annonces</strong> pour «&nbsp;vélo&nbsp;»</p>
                    <div class="flex items-center gap-2">
                        <label for="tri" class="text-sm text-ink/60">Trier par</label>
                        <select id="tri" name="tri" class="rounded-xl border border-ink/15 bg-cream px-3 py-2 text-sm text-ink/80 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                            <option>Pertinence</option>
                            <option>Prix croissant</option>
                            <option>Plus récentes</option>
                        </select>
                    </div>
                </div>

                <div class="mt-5 grid gap-5 sm:grid-cols-2 xl:grid-cols-3">

                    <!-- Carte annonce (modèle pour toutes les pages) -->
                    <a href="article-detail.html" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
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

                    <a href="article-detail.html" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                        <div class="relative grid aspect-[4/3] place-items-center bg-terracotta-100 text-5xl" aria-hidden="true">🛴
                            <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Vélos</span>
                        </div>
                        <div class="flex flex-1 flex-col p-4">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Trottinette pliable adulte</h3>
                                <p class="shrink-0 font-semibold text-terracotta-600">60&nbsp;€</p>
                            </div>
                            <p class="mt-1 text-sm text-ink/60">Sofiane · Centre-ville</p>
                            <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                                <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,9</span> (19 avis)</span>
                                <span>il y a 4 h</span>
                            </div>
                        </div>
                    </a>

                    <a href="article-detail.html" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                        <div class="relative grid aspect-[4/3] place-items-center bg-amber-100 text-5xl" aria-hidden="true">🪖
                            <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Accessoires</span>
                        </div>
                        <div class="flex flex-1 flex-col p-4">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Casque de vélo taille M</h3>
                                <p class="shrink-0 font-semibold text-terracotta-600">12&nbsp;€</p>
                            </div>
                            <p class="mt-1 text-sm text-ink/60">Fatou · Rue des Écoles</p>
                            <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                                <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,7</span> (8 avis)</span>
                                <span>il y a 6 h</span>
                            </div>
                        </div>
                    </a>

                    <a href="article-detail.html" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                        <div class="relative grid aspect-[4/3] place-items-center bg-sky-100 text-5xl" aria-hidden="true">⚙️
                            <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Accessoires</span>
                        </div>
                        <div class="flex flex-1 flex-col p-4">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Lot de chambres à air + patins</h3>
                                <p class="shrink-0 font-semibold text-terracotta-600">10&nbsp;€</p>
                            </div>
                            <p class="mt-1 text-sm text-ink/60">Marc · Faubourg Nord</p>
                            <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                                <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,6</span> (31 avis)</span>
                                <span>hier</span>
                            </div>
                        </div>
                    </a>

                    <a href="article-detail.html" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                        <div class="relative grid aspect-[4/3] place-items-center bg-rose-100 text-5xl" aria-hidden="true">🎒
                            <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Accessoires</span>
                        </div>
                        <div class="flex flex-1 flex-col p-4">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Sacoche de vélo étanche</h3>
                                <p class="shrink-0 font-semibold text-terracotta-600">18&nbsp;€</p>
                            </div>
                            <p class="mt-1 text-sm text-ink/60">Inès · Quartier des Tilleuls</p>
                            <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                                <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,8</span> (14 avis)</span>
                                <span>hier</span>
                            </div>
                        </div>
                    </a>

                    <a href="article-detail.html" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                        <div class="relative grid aspect-[4/3] place-items-center bg-violet-100 text-5xl" aria-hidden="true">🚵
                            <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Vélos</span>
                        </div>
                        <div class="flex flex-1 flex-col p-4">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">VTT tout terrain, cadre L</h3>
                                <p class="shrink-0 font-semibold text-terracotta-600">120&nbsp;€</p>
                            </div>
                            <p class="mt-1 text-sm text-ink/60">Yannick · Faubourg Nord</p>
                            <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                                <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">5,0</span> (11 avis)</span>
                                <span>il y a 2 j</span>
                            </div>
                        </div>
                    </a>

                    <a href="article-detail.html" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                        <div class="relative grid aspect-[4/3] place-items-center bg-sage-100 text-5xl" aria-hidden="true">💡
                            <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Accessoires</span>
                        </div>
                        <div class="flex flex-1 flex-col p-4">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Éclairage avant + arrière LED</h3>
                                <p class="shrink-0 font-semibold text-terracotta-600">8&nbsp;€</p>
                            </div>
                            <p class="mt-1 text-sm text-ink/60">Nadia · Centre-ville</p>
                            <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                                <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,5</span> (6 avis)</span>
                                <span>il y a 2 j</span>
                            </div>
                        </div>
                    </a>

                    <a href="article-detail.html" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                        <div class="relative grid aspect-[4/3] place-items-center bg-amber-100 text-5xl" aria-hidden="true">🚲
                            <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Vélos</span>
                        </div>
                        <div class="flex flex-1 flex-col p-4">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Vélo enfant 6-9 ans, roue 20"</h3>
                                <p class="shrink-0 font-semibold text-terracotta-600">35&nbsp;€</p>
                            </div>
                            <p class="mt-1 text-sm text-ink/60">Hélène · Rue des Écoles</p>
                            <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                                <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,8</span> (17 avis)</span>
                                <span>il y a 3 j</span>
                            </div>
                        </div>
                    </a>

                    <a href="article-detail.html" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
                        <div class="relative grid aspect-[4/3] place-items-center bg-terracotta-100 text-5xl" aria-hidden="true">🔧
                            <span class="absolute left-3 top-3 rounded-full bg-paper/90 px-2.5 py-1 text-[11px] font-semibold text-ink/70">Accessoires</span>
                        </div>
                        <div class="flex flex-1 flex-col p-4">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="font-display font-semibold leading-snug text-ink group-hover:text-terracotta-600">Pompe de garage + jeu de clés</h3>
                                <p class="shrink-0 font-semibold text-terracotta-600">22&nbsp;€</p>
                            </div>
                            <p class="mt-1 text-sm text-ink/60">Karim · Quartier des Tilleuls</p>
                            <div class="mt-auto flex items-center justify-between pt-3 text-xs text-ink/60">
                                <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,7</span> (9 avis)</span>
                                <span>il y a 4 j</span>
                            </div>
                        </div>
                    </a>

                </div>

                <!-- ---------- Pagination ---------- -->
                <nav aria-label="Pagination des résultats" class="mt-8 flex flex-wrap items-center justify-center gap-2">
                    <a href="recherche.html" aria-disabled="true" class="rounded-xl border border-ink/15 bg-paper px-4 py-2 text-sm font-semibold text-ink/45">Précédent</a>
                    <ul class="flex items-center gap-2">
                        <li><a href="recherche.html" aria-current="page" class="grid h-10 w-10 place-items-center rounded-xl bg-terracotta-500 text-sm font-semibold text-paper">1</a></li>
                        <li><a href="recherche.html" class="grid h-10 w-10 place-items-center rounded-xl border border-ink/15 bg-paper text-sm font-semibold text-ink/70 hover:border-terracotta-300 hover:text-terracotta-600">2</a></li>
                        <li><a href="recherche.html" class="grid h-10 w-10 place-items-center rounded-xl border border-ink/15 bg-paper text-sm font-semibold text-ink/70 hover:border-terracotta-300 hover:text-terracotta-600">3</a></li>
                    </ul>
                    <a href="recherche.html" class="rounded-xl border border-ink/15 bg-paper px-4 py-2 text-sm font-semibold text-ink/70 hover:border-terracotta-300 hover:text-terracotta-600">Suivant</a>
                </nav>
            </div>
        </div>
    </section>
@endsection
