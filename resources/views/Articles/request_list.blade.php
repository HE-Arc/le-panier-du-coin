@extends("layout.app")
@section('title', "Demandes ouvertes")
@section("content")
    <!-- ============================ INTRO ============================ -->
    <section class="border-b border-ink/10 bg-cream">
        <div class="mx-auto max-w-6xl px-4 py-10 sm:py-14">
            <p class="text-xs font-bold uppercase tracking-[0.15em] text-sage-600">Le marché à l'envers</p>
            <h1 class="mt-3 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Demandes ouvertes</h1>
            <p class="mt-3 max-w-2xl text-base leading-relaxed text-ink/70">
                Ici, ce sont les habitants qui cherchent&nbsp;: propose-leur l'objet qu'ils attendent.
            </p>

            <!-- Barre d'actions -->
            <!-- TODO: Recherche à adapter selon la BDD-->
            <div class="mt-7 flex flex-col gap-3 sm:flex-row sm:items-center">
                <form action="{{ route('requests.index') }}" method="get" class="flex flex-1 flex-col gap-2 rounded-2xl border border-ink/10 bg-paper p-2 shadow-soft sm:flex-row sm:items-center sm:rounded-full">
                    <label for="q" class="sr-only">Rechercher une demande</label>
                    <input id="q" name="q" type="search" placeholder="Poussette, vélo, livres…"
                           class="w-full rounded-xl border-0 bg-transparent px-4 py-3 text-sm text-ink placeholder:text-ink/45 focus:ring-0 sm:flex-1">
                    <label for="quartier" class="sr-only">Quartier</label>
                    <select id="quartier" name="quartier" class="rounded-xl border-0 bg-cream px-3 py-3 text-sm text-ink/80 focus:ring-0">
                        <option value="">Tous les quartiers</option>
                        <option value="tilleuls">Quartier des Tilleuls</option>
                        <option value="centre-ville">Centre-ville</option>
                        <option value="faubourg-nord">Faubourg Nord</option>
                        <option value="rue-des-ecoles">Rue des Écoles</option>
                    </select>
                    <button type="submit" class="rounded-xl bg-terracotta-500 px-5 py-3 text-sm font-semibold text-paper transition hover:bg-terracotta-600">
                        Rechercher
                    </button>
                </form>
                <a href="{{ route('requests.create') }}" class="shrink-0 rounded-xl bg-terracotta-500 px-5 py-3.5 text-center text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">
                    Déposer une demande
                </a>
            </div>

            <!-- Filtres -->
            <!-- TODO: flitrage à adapter selon la BDD-->
            <form action="{{ route('requests.index') }}" method="get" class="mt-5 flex flex-col gap-4 rounded-2xl border border-ink/10 bg-paper p-4 lg:flex-row lg:items-end lg:justify-between">
                <input type="hidden" name="q" value="{{ request('q') }}">
                <input type="hidden" name="quartier" value="{{ request('quartier') }}">
                <fieldset>
                    <legend class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Statut</legend>
                    <div class="mt-2 flex flex-wrap gap-4">
                        <label for="statut-ouverte" class="flex items-center gap-2 text-sm text-ink/75">
                            <input id="statut-ouverte" name="statut[]" type="checkbox" value="ouverte" checked class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-400">
                            Ouvertes
                        </label>
                        <label for="statut-cours" class="flex items-center gap-2 text-sm text-ink/75">
                            <input id="statut-cours" name="statut[]" type="checkbox" value="en-cours" class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-400">
                            En cours
                        </label>
                        <label for="statut-pourvue" class="flex items-center gap-2 text-sm text-ink/75">
                            <input id="statut-pourvue" name="statut[]" type="checkbox" value="pourvue" class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-400">
                            Pourvues
                        </label>
                    </div>
                </fieldset>

                <div class="lg:w-56">
                    <label for="budget" class="block text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Budget maximum</label>
                    <select id="budget" name="budget" class="mt-2 w-full rounded-xl border border-ink/15 bg-cream px-3 py-2.5 text-sm text-ink/80 focus:border-terracotta-400 focus:ring-terracotta-400">
                        <option value="">Peu importe</option>
                        <option value="30">Moins de 30 €</option>
                        <option value="50">Moins de 50 €</option>
                        <option value="100">Moins de 100 €</option>
                        <option value="150">Moins de 150 €</option>
                    </select>
                </div>

                <button type="submit" class="rounded-xl bg-terracotta-500 px-5 py-2.5 text-sm font-semibold text-paper transition hover:bg-terracotta-600">
                    Filtrer
                </button>
            </form>
        </div>
    </section>

    <!-- ============================ LISTE DES DEMANDES ============================ -->
    <!-- TODO: affichage des articles à adapter selon la BDD-->
    <section class="mx-auto max-w-6xl px-4 py-10 sm:py-14">
        <div class="flex flex-wrap items-end justify-between gap-3">
            <h2 class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">6 demandes en cours</h2>
            <p class="text-sm text-ink/60">Triées par date de dépôt</p>
        </div>

        <ul class="mt-7 space-y-4">

            <li class="flex flex-col gap-4 rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift sm:flex-row sm:items-center sm:p-5">
                <span class="grid h-14 w-14 shrink-0 place-items-center rounded-full bg-cream text-2xl" aria-hidden="true">img</span>
                <div class="min-w-0 flex-1">
                    <h3 class="font-display text-lg font-semibold leading-snug text-ink">Poussette double compacte</h3>
                    <p class="mt-0.5 truncate text-sm text-ink/60">Deux places côte à côte, pliable dans un coffre de citadine, état propre garanti.</p>
                    <p class="mt-2 text-xs text-ink/55">Cherche pour le 15 juin · Quartier des Tilleuls · 3 réponses</p>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-2 sm:flex-col sm:items-end">
                    <span class="rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">Budget 80&nbsp;€</span>
                    <span class="rounded-full bg-green-100 px-2.5 py-1 text-xs font-semibold text-green-700">Ouverte</span>
                    <a href="{{ route('articles.create') }}" class="mt-1 text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Proposer cet objet <span aria-hidden="true">→</span></a>
                </div>
            </li>

            <li class="flex flex-col gap-4 rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift sm:flex-row sm:items-center sm:p-5">
                <span class="grid h-14 w-14 shrink-0 place-items-center rounded-full bg-cream text-2xl" aria-hidden="true">img</span>
                <div class="min-w-0 flex-1">
                    <h3 class="font-display text-lg font-semibold leading-snug text-ink">Étagères murales en métal</h3>
                    <p class="mt-0.5 truncate text-sm text-ink/60">Trois étagères réglables, style industriel, pour équiper un bureau à la maison.</p>
                    <p class="mt-2 text-xs text-ink/55">Cherche pour le 15 juin · Centre-ville · 2 réponses</p>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-2 sm:flex-col sm:items-end">
                    <span class="rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">Budget 30&nbsp;€</span>
                    <span class="rounded-full bg-green-100 px-2.5 py-1 text-xs font-semibold text-green-700">Ouverte</span>
                    <a href="{{ route('articles.create') }}" class="mt-1 text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Proposer cet objet <span aria-hidden="true">→</span></a>
                </div>
            </li>

            <li class="flex flex-col gap-4 rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift sm:flex-row sm:items-center sm:p-5">
                <span class="grid h-14 w-14 shrink-0 place-items-center rounded-full bg-cream text-2xl" aria-hidden="true">img</span>
                <div class="min-w-0 flex-1">
                    <h3 class="font-display text-lg font-semibold leading-snug text-ink">VTT taille adolescent</h3>
                    <p class="mt-0.5 truncate text-sm text-ink/60">Pour un jeune de 14 ans, roue 24 pouces minimum, freins à disque appréciés.</p>
                    <p class="mt-2 text-xs text-ink/55">Cherche pour le 15 juin · Faubourg Nord · 1 réponse</p>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-2 sm:flex-col sm:items-end">
                    <span class="rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">Budget 120&nbsp;€</span>
                    <span class="rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">En cours</span>
                    <a href="{{ route('articles.create') }}" class="mt-1 text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Proposer cet objet <span aria-hidden="true">→</span></a>
                </div>
            </li>

            <li class="flex flex-col gap-4 rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift sm:flex-row sm:items-center sm:p-5">
                <span class="grid h-14 w-14 shrink-0 place-items-center rounded-full bg-cream text-2xl" aria-hidden="true">img</span>
                <div class="min-w-0 flex-1">
                    <h3 class="font-display text-lg font-semibold leading-snug text-ink">Set de casseroles antiadhésif</h3>
                    <p class="mt-0.5 truncate text-sm text-ink/60">Cinq pièces minimum, poignées faciles à saisir, sans rayures profondes.</p>
                    <p class="mt-2 text-xs text-ink/55">Cherche pour le 15 juin · Rue des Écoles · 4 réponses</p>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-2 sm:flex-col sm:items-end">
                    <span class="rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">Budget 25&nbsp;€</span>
                    <span class="rounded-full bg-green-100 px-2.5 py-1 text-xs font-semibold text-green-700">Ouverte</span>
                    <a href="{{ route('articles.create') }}" class="mt-1 text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Proposer cet objet <span aria-hidden="true">→</span></a>
                </div>
            </li>

            <li class="flex flex-col gap-4 rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift sm:flex-row sm:items-center sm:p-5">
                <span class="grid h-14 w-14 shrink-0 place-items-center rounded-full bg-cream text-2xl" aria-hidden="true">img</span>
                <div class="min-w-0 flex-1">
                    <h3 class="font-display text-lg font-semibold leading-snug text-ink">Vélo pliant</h3>
                    <p class="mt-0.5 truncate text-sm text-ink/60">Pour la navette jusqu'à la gare, 6 à 8 vitesses, pliage rapide et sécurisé.</p>
                    <p class="mt-2 text-xs text-ink/55">Cherche pour le 15 juin · Quartier des Tilleuls · 2 réponses</p>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-2 sm:flex-col sm:items-end">
                    <span class="rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">Budget 90&nbsp;€</span>
                    <span class="rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">En cours</span>
                    <a href="{{ route('articles.create') }}" class="mt-1 text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Proposer cet objet <span aria-hidden="true">→</span></a>
                </div>
            </li>

            <li class="flex flex-col gap-4 rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift sm:flex-row sm:items-center sm:p-5">
                <span class="grid h-14 w-14 shrink-0 place-items-center rounded-full bg-cream text-2xl" aria-hidden="true">img</span>
                <div class="min-w-0 flex-1">
                    <h3 class="font-display text-lg font-semibold leading-snug text-ink">Livres de terminale</h3>
                    <p class="mt-0.5 truncate text-sm text-ink/60">Les huit manuels du programme de spécialité maths et physique-chimie.</p>
                    <p class="mt-2 text-xs text-ink/55">Cherche pour le 15 juin · Centre-ville · 0 réponse</p>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-2 sm:flex-col sm:items-end">
                    <span class="rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">Budget 40&nbsp;€</span>
                    <span class="rounded-full bg-gray-200 px-2.5 py-1 text-xs font-semibold text-gray-700">Pourvue</span>
                    <a href="{{ route('articles.create') }}" class="mt-1 text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Proposer cet objet <span aria-hidden="true">→</span></a>
                </div>
            </li>

        </ul>

        <!-- TODO: dinamiser le nombre d'article à afficher-->
        <div class="mt-8 flex justify-center">
            <button type="button" class="rounded-xl border border-ink/15 bg-paper px-6 py-3 text-sm font-semibold text-ink transition hover:border-ink/30 hover:bg-cream">
                Charger plus de demandes
            </button>
        </div>
    </section>
@endsection
