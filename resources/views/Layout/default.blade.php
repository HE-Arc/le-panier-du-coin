
<!-- TODO: A adapter dans le futur selon les modèles et controleur-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil — Le Panier du coin</title>
    <meta name="description" content="La brocante communautaire de ta ville : vends, cherche et trouve des objets près de chez toi.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="assets/theme.js"></script>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="min-h-screen font-sans antialiased">
    <!--TODO: changer URL pour les routes -->
    <a href="#contenu" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded-lg focus:bg-ink focus:px-4 focus:py-2 focus:text-paper">Aller au contenu</a>

    <header class="sticky top-0 z-40 border-b border-ink/10 bg-paper/90 backdrop-blur">
        <div class="mx-auto flex h-16 max-w-6xl items-center gap-6 px-4">
            <!--TODO: changer URL pour les routes -->
            <a href="accueil.html" class="flex shrink-0 items-center gap-2">
                <span class="grid h-9 w-9 place-items-center rounded-xl bg-terracotta-100 text-terracotta-600" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                        <path d="M3 8h18l-1.6 9.2a2 2 0 0 1-2 1.8H6.6a2 2 0 0 1-2-1.8L3 8Z"/>
                        <path d="M8 8 10 3M16 8 14 3"/>
                        <path d="M9.5 12v3M14.5 12v3"/>
                    </svg>
                </span>
                <span class="font-display text-lg font-bold tracking-tight text-ink">Le Panier du <span class="text-terracotta-600">coin</span></span>
            </a>

            <nav aria-label="Navigation principale" class="hidden items-center gap-1 text-sm font-medium text-ink/70 md:flex">
                <!--TODO: changer URL pour les routes -->
                <a href="accueil.html" aria-current="page" class="rounded-lg bg-terracotta-50 px-3 py-2 text-terracotta-700">Accueil</a>
                <!--TODO: changer URL pour les routes -->
                <a href="recherche.html" class="rounded-lg px-3 py-2 hover:bg-cream hover:text-ink">Annonces</a>
                <!--TODO: changer URL pour les routes -->
                <a href="demandes.html" class="rounded-lg px-3 py-2 hover:bg-cream hover:text-ink">Demandes</a>
                <!--TODO: changer URL pour les routes -->
                <a href="qui-sommes-nous.html" class="rounded-lg px-3 py-2 hover:bg-cream hover:text-ink">Qui sommes-nous</a>
            </nav>

            <div class="ml-auto hidden items-center gap-2 md:flex">
                <!--TODO: changer URL pour les routes -->
                <a href="login.html" class="rounded-xl px-4 py-2 text-sm font-semibold text-ink/80 hover:bg-cream hover:text-ink">Se connecter</a>
                <!--TODO: changer URL pour les routes -->
                <a href="article-ajout.html" class="rounded-xl bg-terracotta-500 px-4 py-2 text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">Publier une annonce</a>
            </div>

            <button id="menu-btn" type="button" class="ml-auto grid h-10 w-10 place-items-center rounded-xl border border-ink/15 text-ink md:hidden"
                aria-expanded="false" aria-controls="menu-mobile" aria-label="Ouvrir le menu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" class="h-5 w-5"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
            </button>
        </div>

        <nav id="menu-mobile" aria-label="Navigation mobile" class="hidden border-t border-ink/10 bg-paper px-4 pb-4 pt-2 md:hidden">
            <!--TODO: changer URL pour les routes -->
            <a href="accueil.html" class="block rounded-lg px-3 py-2.5 font-medium text-terracotta-700 hover:bg-cream">Accueil</a>
            <!--TODO: changer URL pour les routes -->
            <a href="recherche.html" class="block rounded-lg px-3 py-2.5 font-medium text-ink/75 hover:bg-cream hover:text-ink">Annonces</a>
            <!--TODO: changer URL pour les routes -->
            <a href="demandes.html" class="block rounded-lg px-3 py-2.5 font-medium text-ink/75 hover:bg-cream hover:text-ink">Demandes</a>
            <!--TODO: changer URL pour les routes -->
            <a href="qui-sommes-nous.html" class="block rounded-lg px-3 py-2.5 font-medium text-ink/75 hover:bg-cream hover:text-ink">Qui sommes-nous</a>
            <div class="mt-3 flex flex-col gap-2 border-t border-ink/10 pt-3">
                <!--TODO: changer URL pour les routes -->
                <a href="login.html" class="rounded-xl border border-ink/15 px-4 py-2.5 text-center text-sm font-semibold text-ink">Se connecter</a>
                <!--TODO: changer URL pour les routes -->
                <a href="article-ajout.html" class="rounded-xl bg-terracotta-500 px-4 py-2.5 text-center text-sm font-semibold text-paper">Publier une annonce</a>
            </div>
        </nav>
    </header>
    <main id="contenu">
        <!--TODO: pour mettre tous le reste du bordel -->
        <!-- Code copié du workshop -->
        <div class="container mt-3">
            <div class="container mt-3">
                @if (session('success')) {{ session('success') }} @endif @yield('content')
            </div>
        </div>
    </main>
    <footer class="border-t border-ink/10 bg-paper">
        <div class="mx-auto grid max-w-6xl gap-8 px-4 py-12 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <p class="font-display text-base font-bold text-ink">Le Panier du <span class="text-terracotta-600">coin</span></p>
                <p class="mt-3 text-sm leading-relaxed text-ink/60">La brocante communautaire des habitants&nbsp;: vendre, demander et se retrouver près de chez soi.</p>
            </div>
            <nav aria-label="Acheter">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Acheter</p>
                <ul class="mt-3 space-y-2 text-sm text-ink/70">
                    <!--TODO: changer URL pour les routes -->
                    <li><a href="recherche.html" class="hover:text-terracotta-600">Toutes les annonces</a></li>
                    <!--TODO: changer URL pour les routes -->
                    <li><a href="demandes.html" class="hover:text-terracotta-600">Demandes ouvertes</a></li>
                    <!--TODO: changer URL pour les routes -->
                    <li><a href="demande-creation.html" class="hover:text-terracotta-600">Déposer une demande</a></li>
                </ul>
            </nav>
            <nav aria-label="Vendre">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Vendre</p>
                <ul class="mt-3 space-y-2 text-sm text-ink/70">
                    <!--TODO: changer URL pour les routes -->
                    <li><a href="article-ajout.html" class="hover:text-terracotta-600">Publier une annonce</a></li>
                    <!--TODO: changer URL pour les routes -->
                    <li><a href="dashboard.html" class="hover:text-terracotta-600">Mon tableau de bord</a></li>
                    <!--TODO: changer URL pour les routes -->
                    <li><a href="profil-vendeur.html" class="hover:text-terracotta-600">Profil &amp; réputation</a></li>
                </ul>
            </nav>
            <nav aria-label="Le projet">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Le projet</p>
                <ul class="mt-3 space-y-2 text-sm text-ink/70">
                    <!--TODO: changer URL pour les routes -->
                    <li><a href="qui-sommes-nous.html" class="hover:text-terracotta-600">Qui sommes-nous&nbsp;?</a></li>
                    <!--TODO: changer URL pour les routes -->
                    <li><a href="conditions-utilisation.html" class="hover:text-terracotta-600">Conditions d'utilisation</a></li>
                    <!--TODO: changer URL pour les routes -->
                    <li><a href="login.html" class="hover:text-terracotta-600">Se connecter</a></li>
                </ul>
            </nav>
        </div>
        <div class="border-t border-ink/10">
            <p class="mx-auto max-w-6xl px-4 py-5 text-xs text-ink/50">© 2026 Le Panier du coin — maquette statique, hors application.</p>
        </div>
    </footer>

    <script>
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('menu-mobile');
        btn.addEventListener('click', () => {
            const open = menu.classList.toggle('hidden') === false;
            btn.setAttribute('aria-expanded', String(open));
            btn.setAttribute('aria-label', open ? 'Fermer le menu' : 'Ouvrir le menu');
        });
    </script>

    <span class="mockup-flag" aria-hidden="true">Maquette · Accueil</span>
</body>
</html>
