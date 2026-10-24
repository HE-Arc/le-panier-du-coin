<!-- TODO: A adapter dans le futur selon les modèles et controleur-->
@extends("layout.app")
@section("content")
    <div class="mx-auto max-w-6xl px-4 py-10 lg:grid lg:grid-cols-[17rem_1fr] lg:gap-12 lg:py-14">

        <!-- ============================ SOMMAIRE ============================ -->
        <aside class="lg:sticky lg:top-24 lg:self-start">
            <nav aria-labelledby="titre-sommaire" class="rounded-2xl border border-ink/10 bg-cream p-4 lg:border-0 lg:bg-transparent lg:p-0">
                <h2 id="titre-sommaire" class="text-xs font-bold uppercase tracking-[0.15em] text-ink/50">Sommaire</h2>
                <ol class="mt-3 grid gap-2 sm:grid-cols-2 lg:grid-cols-1 lg:gap-1">
                    <li><a href="#objet" class="block rounded-xl border border-ink/10 bg-paper px-3.5 py-2.5 text-sm font-medium text-ink/75 shadow-soft transition hover:border-terracotta-300 hover:text-terracotta-600 lg:border-transparent lg:bg-transparent lg:shadow-none">1. Objet des conditions</a></li>
                    <li><a href="#compte" class="block rounded-xl border border-ink/10 bg-paper px-3.5 py-2.5 text-sm font-medium text-ink/75 shadow-soft transition hover:border-terracotta-300 hover:text-terracotta-600 lg:border-transparent lg:bg-transparent lg:shadow-none">2. Compte et inscription</a></li>
                    <li><a href="#annonces" class="block rounded-xl border border-ink/10 bg-paper px-3.5 py-2.5 text-sm font-medium text-ink/75 shadow-soft transition hover:border-terracotta-300 hover:text-terracotta-600 lg:border-transparent lg:bg-transparent lg:shadow-none">3. Annonces autorisées et interdites</a></li>
                    <li><a href="#echanges" class="block rounded-xl border border-ink/10 bg-paper px-3.5 py-2.5 text-sm font-medium text-ink/75 shadow-soft transition hover:border-terracotta-300 hover:text-terracotta-600 lg:border-transparent lg:bg-transparent lg:shadow-none">4. Échanges entre utilisateurs</a></li>
                    <li><a href="#contenu-publie" class="block rounded-xl border border-ink/10 bg-paper px-3.5 py-2.5 text-sm font-medium text-ink/75 shadow-soft transition hover:border-terracotta-300 hover:text-terracotta-600 lg:border-transparent lg:bg-transparent lg:shadow-none">5. Contenu publié par les utilisateurs</a></li>
                    <li><a href="#reputation" class="block rounded-xl border border-ink/10 bg-paper px-3.5 py-2.5 text-sm font-medium text-ink/75 shadow-soft transition hover:border-terracotta-300 hover:text-terracotta-600 lg:border-transparent lg:bg-transparent lg:shadow-none">6. Réputation et avis</a></li>
                    <li><a href="#donnees" class="block rounded-xl border border-ink/10 bg-paper px-3.5 py-2.5 text-sm font-medium text-ink/75 shadow-soft transition hover:border-terracotta-300 hover:text-terracotta-600 lg:border-transparent lg:bg-transparent lg:shadow-none">7. Données personnelles</a></li>
                    <li><a href="#responsabilite" class="block rounded-xl border border-ink/10 bg-paper px-3.5 py-2.5 text-sm font-medium text-ink/75 shadow-soft transition hover:border-terracotta-300 hover:text-terracotta-600 lg:border-transparent lg:bg-transparent lg:shadow-none">8. Responsabilité et modification</a></li>
                </ol>
            </nav>
        </aside>

        <!-- ============================ CONTENU ============================ -->
        <div class="mt-8 max-w-3xl lg:mt-0">

            <header>
                <p class="text-xs font-bold uppercase tracking-[0.15em] text-terracotta-600">Mentions légales</p>
                <h1 class="mt-3 font-display text-3xl font-bold leading-tight tracking-tight text-ink sm:text-4xl">Conditions d'utilisation</h1>
                <p class="mt-3 text-sm text-ink/60">Dernière mise à jour&nbsp;: 20 octobre 2026 · Version 1.0</p>
            </header>

            <div class="mt-6 rounded-2xl border border-terracotta-200 bg-terracotta-50 p-4 sm:p-5">
                <p class="text-sm leading-relaxed text-terracotta-800">
                    <span class="font-semibold">Résumé rédigé pour la maquette — à remplacer par la version validée.</span>
                    Ce texte sert uniquement à présenter la structure et le ton des conditions&nbsp;: il sera relu et
                    signé avant toute mise en ligne réelle du site.
                </p>
            </div>

            <div class="mt-8 space-y-9">

                <!-- 1 -->
                <section id="objet" aria-labelledby="t-objet" class="scroll-mt-24">
                    <h2 id="t-objet" class="font-display text-xl font-bold text-ink sm:text-2xl">1. Objet des conditions</h2>
                    <div class="mt-3 space-y-3 text-sm leading-relaxed text-ink/70 sm:text-base">
                        <p>
                            Les présentes conditions régissent l'utilisation du site Le Panier du coin, une plateforme
                            communautaire qui met en relation des habitants d'une même ville autour d'annonces de
                            brocante. En créant un compte ou en publiant une annonce, tu acceptes ces conditions
                            dans leur intégralité.
                        </p>
                        <p>
                            Le site a une vocation locale&nbsp;: il est pensé pour des échanges entre personnes
                            résidant à proximité. Il ne constitue ni un service de livraison, ni une plateforme de
                            paiement, ni une garantie de vente entre professionnels.
                        </p>
                    </div>
                </section>

                <!-- 2 -->
                <section id="compte" aria-labelledby="t-compte" class="scroll-mt-24">
                    <h2 id="t-compte" class="font-display text-xl font-bold text-ink sm:text-2xl">2. Compte et inscription</h2>
                    <div class="mt-3 space-y-3 text-sm leading-relaxed text-ink/70 sm:text-base">
                        <p>
                            L'inscription est gratuite et ouverte à toute personne majeure. Elle nécessite une adresse
                            e-mail valide et un prénom ou un pseudo&nbsp;: ces informations apparaîtront sur tes
                            annonces et sur ton profil public.
                        </p>
                        <p>
                            Tu es responsable de la sécurité de tes identifiants et de toutes les activités réalisées
                            depuis ton compte. Une personne, un compte&nbsp;: la revente de comptes ou leur partage
                            entre plusieurs utilisateurs est interdite.
                        </p>
                    </div>
                </section>

                <!-- 3 -->
                <section id="annonces" aria-labelledby="t-annonces" class="scroll-mt-24">
                    <h2 id="t-annonces" class="font-display text-xl font-bold text-ink sm:text-2xl">3. Annonces autorisées et interdites</h2>
                    <div class="mt-3 space-y-3 text-sm leading-relaxed text-ink/70 sm:text-base">
                        <p>
                            Tu peux publier tout objet personnel dont tu es propriétaire, en état de fonctionnement
                            décrit honnêtement, et dont la remise en main propre est possible dans ton quartier.
                            Les annonces sont relues par la modération humaine du site avant ou après publication.
                        </p>
                        <p>Sont strictement interdits&nbsp;:</p>
                        <ul class="list-disc space-y-1.5 pl-5 marker:text-terracotta-500">
                            <li>les armes, les munitions et tout objet contrefait&nbsp;;</li>
                            <li>les médicaments, substances réglementées et dispositifs médicaux&nbsp;;</li>
                            <li>les objets volés, provenant d'un délit ou présentés sous une fausse description&nbsp;;</li>
                            <li>la revente commerciale de marchandises neuves en quantité (revendeurs, grossistes) ;</li>
                            <li>les produits alimentaires périssables, les animaux et tout bien appartenant à un tiers sans son accord.</li>
                        </ul>
                        <p>
                            Une annonce non conforme est retirée sans remboursement d'aucun montant — le service
                            étant gratuit — et peut entraîner la fermeture du compte.
                        </p>
                    </div>
                </section>

                <!-- 4 -->
                <section id="echanges" aria-labelledby="t-echanges" class="scroll-mt-24">
                    <h2 id="t-echanges" class="font-display text-xl font-bold text-ink sm:text-2xl">4. Échanges entre utilisateurs</h2>
                    <div class="mt-3 space-y-3 text-sm leading-relaxed text-ink/70 sm:text-base">
                        <p>
                            Les utilisateurs se contactent via la messagerie du site pour convenir d'un rendez-vous.
                            La remise se fait en main propre, au lieu et à l'heure décidés d'un commun accord,
                            de préférence dans un espace public et fréquenté.
                        </p>
                        <p>
                            Aucun paiement n'est géré par Le Panier du coin à ce stade&nbsp;: le prix affiché est
                            indicatif et reste négociable entre les deux parties, qui s'entendent elles-mêmes sur la
                            façon de régler (espèces, virement entre voisins…).
                        </p>
                        <p>
                            Chacun reste libre d'annuler un rendez-vous. En cas de désaccord sur place, l'échange
                            peut être abandonné sans justification&nbsp;; un signalement via le profil de l'autre
                            personne permet à la modération de prendre connaissance du litige.
                        </p>
                    </div>
                </section>

                <!-- 5 -->
                <section id="contenu-publie" aria-labelledby="t-contenu" class="scroll-mt-24">
                    <h2 id="t-contenu" class="font-display text-xl font-bold text-ink sm:text-2xl">5. Contenu publié par les utilisateurs</h2>
                    <div class="mt-3 space-y-3 text-sm leading-relaxed text-ink/70 sm:text-base">
                        <p>
                            Tu restes propriétaire des textes, photos et messages que tu déposes. Tu accordes au site
                            le droit de les héberger, de les afficher et de les réduire pour l'affichage dans les
                            listes d'annonces, uniquement dans le cadre du service.
                        </p>
                        <p>
                            Tu t'engages à ne pas publier de contenu illicite, diffamatoire, discriminatoire ou
                            portant atteinte à la vie privée d'autrui — notamment des photos de personnes sans leur
                            accord. Les contenus signalés sont examinés sous 48 heures ouvrées.
                        </p>
                    </div>
                </section>

                <!-- 6 -->
                <section id="reputation" aria-labelledby="t-reputation" class="scroll-mt-24">
                    <h2 id="t-reputation" class="font-display text-xl font-bold text-ink sm:text-2xl">6. Réputation et avis</h2>
                    <div class="mt-3 space-y-3 text-sm leading-relaxed text-ink/70 sm:text-base">
                        <p>
                            Après un échange, l'acheteur peut attribuer une note de 1 à 5 étoiles accompagnée d'un
                            commentaire public. Ces avis sont affichés sur le profil du vendeur et ne peuvent être
                            supprimés par leur auteur, sauf erreur manifeste.
                        </p>
                        <p>
                            Les avis doivent décrire un échange réel. Les avis abusifs, achetés ou postés par des
                            comptes liés à la même personne peuvent être retirés, et le compte concerné suspendu.
                        </p>
                    </div>
                </section>

                <!-- 7 -->
                <section id="donnees" aria-labelledby="t-donnees" class="scroll-mt-24">
                    <h2 id="t-donnees" class="font-display text-xl font-bold text-ink sm:text-2xl">7. Données personnelles</h2>
                    <div class="mt-3 space-y-3 text-sm leading-relaxed text-ink/70 sm:text-base">
                        <p>
                            Nous collectons l'essentiel&nbsp;: adresse e-mail, prénom ou pseudo, quartier, annonces
                            publiées, messages échangés et notes reçues. Ces données servent à faire fonctionner le
                            service, afficher ta réputation et te prévenir des nouveautés liées à tes annonces.
                        </p>
                        <p>
                            Elles ne sont ni revendues, ni transmises à des partenaires commerciales. Tu peux demander
                            la consultation, la rectification ou la suppression de tes données à tout moment&nbsp;:
                            écris-nous simplement via la page <a href="qui-sommes-nous.html" class="font-semibold text-terracotta-600 hover:text-terracotta-700">Qui sommes-nous&nbsp;?</a>
                            et nous te répondons sous 30 jours.
                        </p>
                    </div>
                </section>

                <!-- 8 -->
                <section id="responsabilite" aria-labelledby="t-responsabilite" class="scroll-mt-24">
                    <h2 id="t-responsabilite" class="font-display text-xl font-bold text-ink sm:text-2xl">8. Responsabilité et modification des conditions</h2>
                    <div class="mt-3 space-y-3 text-sm leading-relaxed text-ink/70 sm:text-base">
                        <p>
                            Le Panier du coin met en relation des particuliers&nbsp;: il n'est pas partie aux accords
                            conclus entre eux et ne peut garantir l'exactitude des descriptions, la disponibilité d'un
                            objet ni le comportement d'un utilisateur. La vigilance lors des rendez-vous incombe à
                            chaque personne.
                        </p>
                        <p>
                            Nous pouvons modifier ces conditions pour refléter une évolution du service ou une
                            obligation légale. La date de mise à jour figure en haut de page&nbsp;: toute
                            utilisation après cette date vaut acceptation de la nouvelle version. En cas de doute,
                            écris-nous avant de continuer à utiliser le site.
                        </p>
                    </div>
                </section>
            </div>

            <p class="mt-10 border-t border-ink/10 pt-6 text-sm text-ink/60">
                Une question sur ces conditions&nbsp;?
                <a href="qui-sommes-nous.html" class="font-semibold text-terracotta-600 hover:text-terracotta-700">Écris-nous</a>
                ou consulte le projet.
            </p>
        </div>
    </div>

    <!-- Retour vers l'accueil -->
    <div class="mx-auto max-w-6xl px-4 pb-12">
        <a href="accueil.html" class="inline-flex items-center gap-2 text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">
            <span aria-hidden="true">←</span> Retour à l'accueil
        </a>
    </div>
@endsection
