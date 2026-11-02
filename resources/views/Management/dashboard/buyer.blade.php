@extends("layout.app")
@section('title', "Tableau de bord acheteur")
@section("content")
    @include('Management.dashboard._header', ['mode' => 'buyer'])

    <!-- TODO: remettre en affichage les élément backend quand ils seront implémenté -->
    <!-- ============================ PANNEAU ACHETEUR ============================ -->
    <!--
    <section aria-label="Tableau de bord acheteur" class="mx-auto max-w-6xl px-4 py-10">

        <!-- Chiffres clés acheteur -->
        <!-- TODO: changer avec les infos de la bdd -->
    <!--
        <dl class="grid gap-3 sm:grid-cols-3">
            <div class="rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                <dd class="font-display text-2xl font-bold text-ink">2</dd>
                <dt class="mt-1 text-sm text-ink/60">achats en cours</dt>
            </div>
            <div class="rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                <dd class="font-display text-2xl font-bold text-ink">1</dd>
                <dt class="mt-1 text-sm text-ink/60">demande déposée</dt>
            </div>
            <div class="rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                <dd class="font-display text-2xl font-bold text-terracotta-600">3</dd>
                <dt class="mt-1 text-sm text-ink/60">messages non lus</dt>
            </div>
        </dl>

        <!-- Mes achats en cours -->
        <!-- TODO: a adapter avec les info de la BDD-->
    <!--
        <section class="mt-10" aria-labelledby="titre-achats">
            <div class="flex flex-wrap items-end justify-between gap-3">
                <div>
                    <h2 id="titre-achats" class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Mes achats en cours</h2>
                    <p class="mt-1.5 text-sm text-ink/60">Les objets pour lesquels une discussion est ouverte.</p>
                </div>
                <a href="{{ route('search') }}" class="text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Parcourir les annonces <span aria-hidden="true">→</span></a>
            </div>

            <ul class="mt-6 space-y-3">
                <li class="flex flex-col gap-4 rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft sm:flex-row sm:items-center">
                    <span class="grid h-14 w-14 shrink-0 place-items-center rounded-xl bg-sage-100 text-2xl" aria-hidden="true">🚲</span>
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="font-display font-semibold text-ink">Vélo de ville — 3 vitesses</h3>
                            <span class="rounded-full bg-amber-100 px-2.5 py-0.5 text-xs font-semibold text-amber-700">En discussion</span>
                        </div>
                        <p class="mt-1 text-sm text-ink/60"><span class="font-semibold text-terracotta-600">45&nbsp;€</span> · Camille · Quartier des Tilleuls · en discussion avec Camille</p>
                    </div>
                    <a href="{{ route('articles.show', 1) }}" class="shrink-0 rounded-xl border border-ink/15 bg-paper px-4 py-2.5 text-center text-sm font-semibold text-ink transition hover:border-ink/30">Voir la discussion</a>
                </li>

                <li class="flex flex-col gap-4 rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft sm:flex-row sm:items-center">
                    <span class="grid h-14 w-14 shrink-0 place-items-center rounded-xl bg-terracotta-100 text-2xl" aria-hidden="true">🪑</span>
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="font-display font-semibold text-ink">Lot de 2 chaises en bois</h3>
                            <span class="rounded-full bg-sage-100 px-2.5 py-0.5 text-xs font-semibold text-sage-700">Remise prévue samedi</span>
                        </div>
                        <p class="mt-1 text-sm text-ink/60"><span class="font-semibold text-terracotta-600">20&nbsp;€</span> · Yannick · Centre-ville · rendez-vous confirmé à 10 h</p>
                    </div>
                    <a href="{{ route('articles.show', 1) }}" class="shrink-0 rounded-xl border border-ink/15 bg-paper px-4 py-2.5 text-center text-sm font-semibold text-ink transition hover:border-ink/30">Voir la discussion</a>
                </li>

                <li class="flex flex-col gap-4 rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft sm:flex-row sm:items-center">
                    <span class="grid h-14 w-14 shrink-0 place-items-center rounded-xl bg-sky-100 text-2xl" aria-hidden="true">☕</span>
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="font-display font-semibold text-ink">Machine à café à capsules</h3>
                            <span class="rounded-full bg-ink/10 px-2.5 py-0.5 text-xs font-semibold text-ink/60">En attente de réponse</span>
                        </div>
                        <p class="mt-1 text-sm text-ink/60"><span class="font-semibold text-terracotta-600">30&nbsp;€</span> · Marc (toi) · Faubourg Nord · message envoyé hier</p>
                    </div>
                    <a href="{{ route('articles.show', 1) }}" class="shrink-0 rounded-xl border border-ink/15 bg-paper px-4 py-2.5 text-center text-sm font-semibold text-ink transition hover:border-ink/30">Voir la discussion</a>
                </li>
            </ul>
        </section>

        <!-- Mes demandes -->
    <!--
        <section class="mt-10" aria-labelledby="titre-demandes">
            <div class="flex flex-wrap items-end justify-between gap-3">
                <h2 id="titre-demandes" class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Mes demandes</h2>
                <a href="{{ route('requests.create') }}" class="text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Déposer une demande <span aria-hidden="true">→</span></a>
            </div>

            <div class="mt-5 rounded-2xl border border-ink/10 bg-cream p-4 sm:p-5">
                <div class="flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <h3 class="font-display font-semibold text-ink">Étagères murales en métal</h3>
                        <p class="mt-1 text-sm text-ink/60">Déposée le 12 octobre · Centre-ville · 1 réponse d'un vendeur</p>
                    </div>
                    <span class="rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">Budget 30&nbsp;€</span>
                </div>
                <div class="mt-4 flex flex-wrap gap-3">
                    <a href="{{ route('requests.index') }}" class="rounded-xl bg-sage-500 px-4 py-2.5 text-sm font-semibold text-paper transition hover:bg-sage-600">Gérer</a>
                    <a href="{{ route('requests.index') }}" class="rounded-xl border border-ink/15 bg-paper px-4 py-2.5 text-sm font-semibold text-ink transition hover:border-ink/30">Voir les réponses</a>
                </div>
            </div>

            <p class="mt-4">
                <a href="{{ route('requests.create') }}" class="text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Déposer une demande <span aria-hidden="true">→</span></a>
            </p>
        </section>

        <!-- Suppression de compte -->
        <section class="mt-10 rounded-2xl border border-terracotta-200 bg-terracotta-50 p-5">
            <h2 class="font-display text-lg font-bold text-terracotta-800">Se désinscrire</h2>
            <p class="mt-1 text-sm text-terracotta-700">Supprime définitivement ton compte.</p>
            <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4 flex flex-col gap-3 sm:flex-row sm:items-end">
                @csrf
                @method('DELETE')
                <div class="flex-1">
                    <label for="delete-password" class="mb-1.5 block text-sm font-semibold text-ink">Mot de passe</label>
                    <input id="delete-password" name="password" type="password" required
                           class="w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                    @error('password')
                        <p class="mt-1 text-xs text-terracotta-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="rounded-xl bg-terracotta-500 px-5 py-3 text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">
                    Supprimer mon compte
                </button>
            </form>
        </section>
    </section>
@endsection
