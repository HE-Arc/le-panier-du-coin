@extends("layout.app")
@section('title', "Qui sommes-nous")
@section("content")
    <!-- ============================ HERO ÉDITORIAL ============================ -->
    <section class="relative overflow-hidden border-b border-ink/10">
        <div class="pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
            <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-terracotta-100 blur-3xl opacity-70"></div>
            <div class="absolute -left-20 top-32 h-64 w-64 rounded-full bg-sage-100 blur-3xl opacity-70"></div>
        </div>

        <div class="mx-auto max-w-6xl px-4 py-14 lg:py-20">
            <p class="inline-flex items-center gap-2 rounded-full border border-ink/10 bg-paper px-3.5 py-1.5 text-xs font-semibold text-ink/70">
                <span class="h-1.5 w-1.5 rounded-full bg-terracotta-500" aria-hidden="true"></span>
                Qui sommes-nous&nbsp;?
            </p>
            <h1 class="mt-6 max-w-3xl font-display text-4xl font-bold leading-[1.05] tracking-tight text-ink sm:text-5xl lg:text-6xl">
                Une brocante tenue par les habitants, <span class="text-terracotta-600">pour les habitants.</span>
            </h1>
            <p class="mt-5 max-w-2xl text-base leading-relaxed text-ink/70 sm:text-lg">
                Le Panier du coin est né dans un quartier, entre deux voisins qui cherchaient l'un un vélo,
                l'autre une place de débarras. Nous avons voulu un endroit simple, local et gratuit&nbsp;:
                un marché où les objets circulent de main en main, sans plateforme qui prélève au passage.
            </p>
        </div>
    </section>

    <!-- ============================ NOTRE HISTOIRE ============================ -->
    <section class="mx-auto max-w-6xl px-4 py-14" aria-labelledby="titre-histoire">
        <div class="grid gap-8 lg:grid-cols-[0.8fr_1.2fr]">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.15em] text-sage-600">Notre histoire</p>
                <h2 id="titre-histoire" class="mt-3 font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">
                    D'un constat de voisinage à un marché de quartier.
                </h2>
                <div class="mt-5 grid gap-3 sm:grid-cols-3">
                    <span class="grid aspect-square place-items-center rounded-2xl bg-sage-100 text-3xl" aria-hidden="true">img</span>
                    <span class="grid aspect-square place-items-center rounded-2xl bg-terracotta-100 text-3xl" aria-hidden="true">img</span>
                    <span class="grid aspect-square place-items-center rounded-2xl bg-amber-100 text-3xl" aria-hidden="true">img</span>
                </div>
            </div>

            <div class="space-y-4 text-sm leading-relaxed text-ink/70 sm:text-base">
                <p>
                    Tout a commencé par un constat partagé dans l'immeuble&nbsp;: des objets dorment dans les caves
                    et sur les trottoirs pendant que d'autres habitants cherchent précisément ce type de meuble,
                    d'outil ou de jouet. D'un côté des «&nbsp;à prendre, c'est gratis&nbsp;» posés deux heures sur le banc
                    du square, de l'autre des besoins exprimés à voix haute au laverie ou à l'épicerie du coin.
                    Les deux ne se croisaient tout simplement jamais.
                </p>
                <p>
                    Nous avons alors voulu créer un marché local organique&nbsp;: pas de grand acteur national,
                    pas de commission prélevée sur chaque transaction, pas de livraison à l'autre bout du pays.
                    Chacun garde la totalité de son prix, les échanges se font dans le quartier, et la confiance
                    se construit sur des visages connus plutôt que sur un logo. C'est pour cela que chaque profil
                    affiche ses avis publics&nbsp;: dans un marché de voisinage, la réputation vaut mieux qu'une
                    garantie à distance.
                </p>
            </div>
        </div>
    </section>

    <!-- ============================ NOS VALEURS ============================ -->
    <section class="border-y border-ink/10 bg-paper" aria-labelledby="titre-valeurs">
        <div class="mx-auto max-w-6xl px-4 py-14">
            <h2 id="titre-valeurs" class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Ce qui nous tient à cœur</h2>
            <p class="mt-1.5 max-w-2xl text-sm text-ink/60">Trois principes, tenus depuis la première annonce.</p>

            <ul class="mt-7 grid gap-5 sm:grid-cols-3">
                <li class="rounded-2xl border border-ink/10 bg-cream p-5 shadow-soft">
                    <span class="grid h-11 w-11 place-items-center rounded-xl bg-paper text-2xl" aria-hidden="true">img</span>
                    <h3 class="mt-4 font-display text-lg font-semibold text-ink">De voisin à voisin</h3>
                    <p class="mt-1.5 text-sm leading-relaxed text-ink/65">
                        On se retrouve au coin de la rue, pas dans un entrepôt. Les quartiers sont la brique
                        de base du site&nbsp;: on cherche près de chez soi, on remet l'objet en main propre.
                    </p>
                </li>
                <li class="rounded-2xl border border-ink/10 bg-cream p-5 shadow-soft">
                    <span class="grid h-11 w-11 place-items-center rounded-xl bg-paper text-2xl" aria-hidden="true">img</span>
                    <h3 class="mt-4 font-display text-lg font-semibold text-ink">Zéro déchet, zéro intermédiaire</h3>
                    <p class="mt-1.5 text-sm leading-relaxed text-ink/65">
                        Un objet remis en service, c'est un objet qui n'est ni acheté neuf ni jeté.
                        Aucune commission n'est prélevée&nbsp;: le prix affiché revient entier à celui qui vend.
                    </p>
                </li>
                <li class="rounded-2xl border border-ink/10 bg-cream p-5 shadow-soft">
                    <span class="grid h-11 w-11 place-items-center rounded-xl bg-paper text-2xl" aria-hidden="true">img</span>
                    <h3 class="mt-4 font-display text-lg font-semibold text-ink">La confiance d'abord</h3>
                    <p class="mt-1.5 text-sm leading-relaxed text-ink/65">
                        Profils vérifiés, avis publics, modération humaine&nbsp;: on préfère une communauté
                        petite mais saine à un catalogue immense et incontrôlé.
                    </p>
                </li>
            </ul>
        </div>
    </section>

    <!-- ============================ CHIFFRES ============================ -->
    <!--TODO: récupérer les data depuis la BDD-->
    <section class="mx-auto max-w-6xl px-4 py-12" aria-label="Le projet en chiffres">
        <dl class="grid grid-cols-2 gap-3 sm:grid-cols-4">
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 text-center shadow-soft">
                <dd class="font-display text-3xl font-bold text-ink">1</dd>
                <dt class="mt-1 text-xs text-ink/60 sm:text-sm">ville pilote</dt>
            </div>
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 text-center shadow-soft">
                <dd class="font-display text-3xl font-bold text-ink">4</dd>
                <dt class="mt-1 text-xs text-ink/60 sm:text-sm">quartiers couverts</dt>
            </div>
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 text-center shadow-soft">
                <dd class="font-display text-3xl font-bold text-ink">142</dd>
                <dt class="mt-1 text-xs text-ink/60 sm:text-sm">annonces publiées</dt>
            </div>
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 text-center shadow-soft">
                <dd class="font-display text-3xl font-bold text-terracotta-600">0</dd>
                <dt class="mt-1 text-xs text-ink/60 sm:text-sm">commission prélevée</dt>
            </div>
        </dl>
    </section>

    <!-- ============================ COMMENT NOUS FONCTIONNONS ============================ -->
    <section class="mx-auto max-w-6xl px-4 py-14" aria-labelledby="titre-fonctionnement">
        <h2 id="titre-fonctionnement" class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Comment nous marchons</h2>
        <ol class="mt-7 grid gap-5 sm:grid-cols-3">
            <li class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft">
                <span class="font-display text-sm font-bold text-terracotta-500">01</span>
                <h3 class="mt-2 font-display font-semibold text-ink">Remise en main propre</h3>
                <p class="mt-1.5 text-sm leading-relaxed text-ink/65">
                    Le site ne gère ni paiement ni livraison&nbsp;: vous vous contactez, vous fixez un rendez-vous
                    dans le quartier et l'objet change de mains sur place.
                </p>
            </li>
            <li class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft">
                <span class="font-display text-sm font-bold text-terracotta-500">02</span>
                <h3 class="mt-2 font-display font-semibold text-ink">Réputation publique</h3>
                <p class="mt-1.5 text-sm leading-relaxed text-ink/65">
                    Chaque acheteur note son vendeur après l'échange, et chaque note reste visible sur le profil.
                    Une bonne réputation se mérite transaction après transaction.
                </p>
            </li>
            <li class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft">
                <span class="font-display text-sm font-bold text-terracotta-500">03</span>
                <h3 class="mt-2 font-display font-semibold text-ink">Modération humaine</h3>
                <p class="mt-1.5 text-sm leading-relaxed text-ink/65">
                    Des bénévoles relisent les annonces signalées&nbsp;: objets interdits, photos trompeuses
                    ou propos déplacés sont retirés à la main, pas par un filtre opaque.
                </p>
            </li>
        </ol>
    </section>

    <!-- ============================ APPEL À L'ACTION ============================ -->
    <section class="mx-auto max-w-6xl px-4 pb-16">
        <div class="relative overflow-hidden rounded-3xl bg-terracotta-500 px-6 py-10 text-center sm:px-12 sm:py-14">
            <p class="text-xs font-bold uppercase tracking-[0.15em] text-terracotta-100">À toi de jouer</p>
            <h2 class="mx-auto mt-4 max-w-2xl font-display text-2xl font-bold tracking-tight text-white sm:text-3xl">
                Le prochain objet qui circule dans le quartier peut être le tien.
            </h2>
            <p class="mx-auto mt-3 max-w-xl text-sm leading-relaxed text-terracotta-50/90 sm:text-base">
                Publie ce qui ne te sert plus, ou trouve directement ce que tu cherches chez un voisin.
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3">
                <a href="{{ route('articles.create') }}" class="rounded-xl bg-paper px-5 py-2.5 text-sm font-semibold text-terracotta-700 transition hover:bg-cream">Publier une annonce</a>
                <a href="{{ route('search') }}" class="rounded-xl border border-white/40 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-white/10">Voir les annonces</a>
            </div>
        </div>
    </section>
@endsection
