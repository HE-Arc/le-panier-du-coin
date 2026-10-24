<!-- TODO: A adapter dans le futur selon les modèles et controleur-->
@extends("layout.app")
@section("content")
    <!-- ============================ FIL D'ARIANE ============================ -->
    <nav aria-label="Fil d'Ariane" class="border-b border-ink/10 bg-paper">
        <ol class="mx-auto flex max-w-6xl flex-wrap items-center gap-1.5 px-4 py-3.5 text-xs text-ink/55 sm:text-sm">
            <li><a href="accueil.html" class="hover:text-terracotta-600">Accueil</a></li>
            <li aria-hidden="true">›</li>
            <li><a href="recherche.html" class="hover:text-terracotta-600">Annonces</a></li>
            <li aria-hidden="true">›</li>
            <li><a href="recherche.html" class="hover:text-terracotta-600">Vélos</a></li>
            <li aria-hidden="true">›</li>
            <li aria-current="page" class="font-semibold text-ink/75">Vélo de ville</li>
        </ol>
    </nav>

    <!-- ============================ FICHE ARTICLE ============================ -->
    <section class="mx-auto max-w-6xl px-4 py-8">
        <div class="grid gap-8 lg:grid-cols-2 lg:items-start">

            <!-- ---------- Colonne gauche : visuels ---------- -->
            <div>
                <figure class="relative">
                    <div class="grid aspect-[4/3] place-items-center rounded-3xl border border-ink/10 bg-sage-100 text-[7rem] leading-none shadow-soft" role="img" aria-label="Photo du vélo de ville, vue de trois quarts">
                        🚲
                    </div>
                    <figcaption class="absolute left-4 top-4 rounded-full bg-paper/90 px-3 py-1.5 text-xs font-semibold text-ink/70 shadow-soft">
                        Très bon état
                    </figcaption>
                </figure>

                <div class="mt-4 grid grid-cols-4 gap-3" role="group" aria-label="Autres photos de l'annonce">
                    <button type="button" aria-label="Photo 1 : vue de côté" aria-pressed="true"
                            class="grid aspect-square place-items-center rounded-xl border-2 border-terracotta-400 bg-sage-100 text-2xl">🚲</button>
                    <button type="button" aria-label="Photo 2 : le guidon et la dynamo" aria-pressed="false"
                            class="grid aspect-square place-items-center rounded-xl border border-ink/10 bg-cream text-2xl hover:border-terracotta-300">🔦</button>
                    <button type="button" aria-label="Photo 3 : détail de la roue arrière et du dérailleur" aria-pressed="false"
                            class="grid aspect-square place-items-center rounded-xl border border-ink/10 bg-cream text-2xl hover:border-terracotta-300">⚙️</button>
                    <button type="button" aria-label="Photo 4 : la selle et le porte-bagages" aria-pressed="false"
                            class="grid aspect-square place-items-center rounded-xl border border-ink/10 bg-cream text-2xl hover:border-terracotta-300">🔧</button>
                </div>
            </div>

            <!-- ---------- Colonne droite : informations ---------- -->
            <div>
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.12em] text-sage-600">Vélos &amp; vélocipédie</p>
                        <h1 class="mt-2 font-display text-3xl font-bold leading-[1.1] tracking-tight text-ink sm:text-4xl">Vélo de ville — 3 vitesses</h1>
                    </div>
                    <p class="font-display text-3xl font-bold text-terracotta-600">45&nbsp;€</p>
                </div>

                <p class="mt-3 text-sm text-ink/60">Quartier des Tilleuls · mis en ligne il y a 2 h</p>

                <p class="mt-5 text-sm leading-relaxed text-ink/70 sm:text-base">
                    Vélo de ville 3 vitesses à cadre bas, acheté d'occasion il y a trois ans et entretenu régulièrement
                    chez le vélociste du quartier. La chaîne et les patins ont été remplacés le mois dernier, et les deux
                    pneus sont neufs avec chambres à air changées en même temps. Le freinage à contre-pédale répond
                    parfaitement, la dynamo et l'éclairage avant fonctionnent. La selle en cuir est confortable, le
                    porte-bagages arrière peut porter un panier ou un sac de courses. Il convient parfaitement aux
                    personnes mesurant entre 1,60&nbsp;m et 1,80&nbsp;m et se conduit très bien en ligne droite.
                </p>

                <!-- Caractéristiques -->
                <dl class="mt-6 divide-y divide-ink/10 rounded-2xl border border-ink/10 bg-paper text-sm shadow-soft">
                    <div class="flex items-center justify-between gap-4 px-4 py-3">
                        <dt class="text-ink/55">État</dt>
                        <dd class="font-semibold text-ink">Très bon</dd>
                    </div>
                    <div class="flex items-center justify-between gap-4 px-4 py-3">
                        <dt class="text-ink/55">Type</dt>
                        <dd class="font-semibold text-ink">Vélo de ville, 3 vitesses</dd>
                    </div>
                    <div class="flex items-center justify-between gap-4 px-4 py-3">
                        <dt class="text-ink/55">Marque</dt>
                        <dd class="font-semibold text-ink">Peugeot, cadre acier</dd>
                    </div>
                    <div class="flex items-center justify-between gap-4 px-4 py-3">
                        <dt class="text-ink/55">Disponibilité</dt>
                        <dd class="font-semibold text-ink">En semaine après 18 h</dd>
                    </div>
                </dl>

                <!-- Vendeur -->
                <div class="mt-6 rounded-2xl border border-ink/10 bg-cream p-4 sm:p-5">
                    <div class="flex items-center gap-4">
                        <span class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-terracotta-100 font-display text-lg font-bold text-terracotta-700" aria-hidden="true">C</span>
                        <div class="min-w-0">
                            <a href="profil-vendeur.html" class="font-display font-semibold text-ink hover:text-terracotta-600">Camille</a>
                            <p class="flex flex-wrap items-center gap-x-2 gap-y-1 text-xs text-ink/60">
                                <span class="flex items-center gap-1"><span class="text-amber-500" aria-hidden="true">★</span><span class="font-semibold text-ink/75">4,9</span> (23 avis)</span>
                                <span aria-hidden="true">·</span>
                                <span>répond en général sous 2 h</span>
                            </p>
                        </div>
                        <a href="profil-vendeur.html" class="ml-auto hidden shrink-0 text-sm font-semibold text-terracotta-600 hover:text-terracotta-700 sm:block">Voir le profil <span aria-hidden="true">→</span></a>
                    </div>

                    <div class="mt-4 flex flex-col gap-2 sm:flex-row">
                        <a href="dashboard.html" class="rounded-xl bg-terracotta-500 px-5 py-3 text-center text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">Contacter le vendeur</a>
                        <a href="article-detail.html" class="rounded-xl border border-ink/15 bg-paper px-5 py-3 text-center text-sm font-semibold text-ink transition hover:border-ink/30">Ajouter aux favoris</a>
                    </div>
                </div>

                <p class="mt-4 flex items-start gap-2 rounded-xl border border-sage-200 bg-sage-50 px-4 py-3 text-xs leading-relaxed text-sage-700">
                    <span aria-hidden="true">🤝</span>
                    Remise en main propre au Quartier des Tilleuls uniquement&nbsp;: pas d'envoi postal, pas de paiement en ligne sur le site.
                </p>
            </div>
        </div>
    </section>

    <!-- ============================ LE MOT DU VENDEUR ============================ -->
    <section class="border-y border-ink/10 bg-paper">
        <div class="mx-auto max-w-6xl px-4 py-10">
            <h2 class="font-display text-xl font-bold tracking-tight text-ink sm:text-2xl">Le mot du vendeur</h2>
            <blockquote class="mt-4 max-w-3xl rounded-3xl border border-ink/10 bg-cream p-5 sm:p-7">
                <span class="text-amber-300" aria-hidden="true">★★★★★</span>
                <p class="mt-2 font-display text-lg leading-relaxed text-ink sm:text-xl">
                    «&nbsp;Je l'ai utilisé tous les jours pendant trois ans pour aller au travail. Je m'en sépare parce que
                    j'ai déménagé plus loin&nbsp;: l'idée, c'est qu'il serve encore longtemps à quelqu'un du quartier.&nbsp;»
                </p>
                <footer class="mt-3 text-sm text-ink/60">— Camille, Quartier des Tilleuls</footer>
            </blockquote>
        </div>
    </section>

    <!-- ============================ DANS LE MÊME QUARTIER ============================ -->
    <section class="mx-auto max-w-6xl px-4 py-12">
        <div class="flex flex-wrap items-end justify-between gap-3">
            <div>
                <h2 class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Dans le même quartier</h2>
                <p class="mt-1.5 text-sm text-ink/60">D'autres objets disponibles au Quartier des Tilleuls.</p>
            </div>
            <a href="recherche.html" class="text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Voir toutes les annonces <span aria-hidden="true">→</span></a>
        </div>

        <div class="mt-7 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

            <!-- Carte annonce (modèle pour toutes les pages) -->
            <a href="article-detail.html" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
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

            <a href="article-detail.html" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
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

            <a href="article-detail.html" class="group flex flex-col overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift">
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
