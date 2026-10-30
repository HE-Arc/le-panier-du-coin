@extends("layout.app")
@section('title', "Tableau de bord vendeur")
@section("content")
    @include('Management.dashboard._header', ['mode' => 'seller'])

    <!-- ============================ PANNEAU VENDEUR ============================ -->
    <section aria-label="Tableau de bord vendeur" class="mx-auto max-w-6xl px-4 py-10">

        <!-- Chiffres clés vendeur + action -->
        <!-- TODO: changer avec les infos de la bdd -->
        <div class="grid gap-3 sm:grid-cols-[1fr_auto] sm:items-center">
            <dl class="grid gap-3 sm:grid-cols-3">
                <div class="rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                    <dd class="font-display text-2xl font-bold text-ink">6</dd>
                    <dt class="mt-1 text-sm text-ink/60">annonces actives</dt>
                </div>
                <div class="rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                    <dd class="font-display text-2xl font-bold text-ink">148</dd>
                    <dt class="mt-1 text-sm text-ink/60">vues ce mois</dt>
                </div>
                <div class="rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                    <dd class="font-display text-2xl font-bold text-ink">4,9&nbsp;<span class="text-lg text-amber-500" aria-hidden="true">★</span></dd>
                    <dt class="mt-1 text-sm text-ink/60">note moyenne</dt>
                </div>
            </dl>
            <a href="{{ route('articles.create') }}" class="rounded-xl bg-terracotta-500 px-5 py-3 text-center text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">Publier une annonce</a>
        </div>

        <!-- Mes annonces -->
        <!-- TODO: changer avec les infos de la bdd -->
        <section class="mt-10" aria-labelledby="titre-annonces">
            <div class="flex flex-wrap items-end justify-between gap-3">
                <div>
                    <h2 id="titre-annonces" class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Mes annonces</h2>
                    <p class="mt-1.5 text-sm text-ink/60">5 annonces sur les 6 de ton compte (la 6<sup>e</sup> est archivée).</p>
                </div>
                <a href="{{ route('articles.create') }}" class="text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Nouvelle annonce <span aria-hidden="true">→</span></a>
            </div>

            <!-- Version desktop : tableau -->
            <div class="mt-6 hidden overflow-hidden rounded-2xl border border-ink/10 bg-paper shadow-soft md:block">
                <table class="w-full text-left text-sm">
                    <caption class="sr-only">Mes annonces : titre, prix, statut, vues, messages et actions</caption>
                    <thead class="border-b border-ink/10 bg-cream text-xs font-bold uppercase tracking-[0.08em] text-ink/55">
                    <tr>
                        <th scope="col" class="px-4 py-3">Titre</th>
                        <th scope="col" class="px-4 py-3">Prix</th>
                        <th scope="col" class="px-4 py-3">Statut</th>
                        <th scope="col" class="px-4 py-3">Vues</th>
                        <th scope="col" class="px-4 py-3">Messages</th>
                        <th scope="col" class="px-4 py-3 text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-ink/10">
                    <tr class="hover:bg-cream/60">
                        <th scope="row" class="px-4 py-3.5 font-display font-semibold text-ink">Vélo de ville — 3 vitesses</th>
                        <td class="px-4 py-3.5 font-semibold text-terracotta-600">45&nbsp;€</td>
                        <td class="px-4 py-3.5"><span class="rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">En ligne</span></td>
                        <td class="px-4 py-3.5 text-ink/70">212</td>
                        <td class="px-4 py-3.5 text-ink/70">5</td>
                        <td class="px-4 py-3.5 text-right"><a href="{{ route('articles.create') }}" class="font-semibold text-terracotta-600 hover:text-terracotta-700">Modifier</a></td>
                    </tr>
                    <tr class="hover:bg-cream/60">
                        <th scope="row" class="px-4 py-3.5 font-display font-semibold text-ink">Lot de 2 chaises en bois</th>
                        <td class="px-4 py-3.5 font-semibold text-terracotta-600">20&nbsp;€</td>
                        <td class="px-4 py-3.5"><span class="rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">Réservée</span></td>
                        <td class="px-4 py-3.5 text-ink/70">96</td>
                        <td class="px-4 py-3.5 text-ink/70">3</td>
                        <td class="px-4 py-3.5 text-right"><a href="{{ route('articles.create') }}" class="font-semibold text-terracotta-600 hover:text-terracotta-700">Modifier</a></td>
                    </tr>
                    <tr class="hover:bg-cream/60">
                        <th scope="row" class="px-4 py-3.5 font-display font-semibold text-ink">Boîte de 6 jeux de société</th>
                        <td class="px-4 py-3.5 font-semibold text-terracotta-600">15&nbsp;€</td>
                        <td class="px-4 py-3.5"><span class="rounded-full bg-terracotta-100 px-2.5 py-1 text-xs font-semibold text-terracotta-700">Vendue</span></td>
                        <td class="px-4 py-3.5 text-ink/70">154</td>
                        <td class="px-4 py-3.5 text-ink/70">8</td>
                        <td class="px-4 py-3.5 text-right"><a href="{{ route('articles.create') }}" class="font-semibold text-terracotta-600 hover:text-terracotta-700">Modifier</a></td>
                    </tr>
                    <tr class="hover:bg-cream/60">
                        <th scope="row" class="px-4 py-3.5 font-display font-semibold text-ink">Console rétro + 4 manettes</th>
                        <td class="px-4 py-3.5 font-semibold text-terracotta-600">60&nbsp;€</td>
                        <td class="px-4 py-3.5"><span class="rounded-full bg-ink/10 px-2.5 py-1 text-xs font-semibold text-ink/60">Brouillon</span></td>
                        <td class="px-4 py-3.5 text-ink/70">0</td>
                        <td class="px-4 py-3.5 text-ink/70">0</td>
                        <td class="px-4 py-3.5 text-right"><a href="{{ route('articles.create') }}" class="font-semibold text-terracotta-600 hover:text-terracotta-700">Modifier</a></td>
                    </tr>
                    <tr class="hover:bg-cream/60">
                        <th scope="row" class="px-4 py-3.5 font-display font-semibold text-ink">Étagère en bois massif</th>
                        <td class="px-4 py-3.5 font-semibold text-terracotta-600">35&nbsp;€</td>
                        <td class="px-4 py-3.5"><span class="rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">En ligne</span></td>
                        <td class="px-4 py-3.5 text-ink/70">71</td>
                        <td class="px-4 py-3.5 text-ink/70">2</td>
                        <td class="px-4 py-3.5 text-right"><a href="{{ route('articles.create') }}" class="font-semibold text-terracotta-600 hover:text-terracotta-700">Modifier</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Version mobile : cartes empilées -->
            <ul class="mt-6 space-y-3 md:hidden">
                <li class="rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold text-ink">Vélo de ville — 3 vitesses</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">45&nbsp;€</p>
                    </div>
                    <p class="mt-2"><span class="rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">En ligne</span></p>
                    <dl class="mt-3 flex gap-5 text-sm text-ink/65">
                        <div><dt class="inline">Vues&nbsp;: </dt><dd class="inline font-semibold text-ink/80">212</dd></div>
                        <div><dt class="inline">Messages&nbsp;: </dt><dd class="inline font-semibold text-ink/80">5</dd></div>
                    </dl>
                    <a href="{{ route('articles.create') }}" class="mt-3 inline-block rounded-xl border border-ink/15 px-4 py-2 text-sm font-semibold text-ink">Modifier</a>
                </li>

                <li class="rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold text-ink">Lot de 2 chaises en bois</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">20&nbsp;€</p>
                    </div>
                    <p class="mt-2"><span class="rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">Réservée</span></p>
                    <dl class="mt-3 flex gap-5 text-sm text-ink/65">
                        <div><dt class="inline">Vues&nbsp;: </dt><dd class="inline font-semibold text-ink/80">96</dd></div>
                        <div><dt class="inline">Messages&nbsp;: </dt><dd class="inline font-semibold text-ink/80">3</dd></div>
                    </dl>
                    <a href="{{ route('articles.create') }}" class="mt-3 inline-block rounded-xl border border-ink/15 px-4 py-2 text-sm font-semibold text-ink">Modifier</a>
                </li>

                <li class="rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold text-ink">Boîte de 6 jeux de société</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">15&nbsp;€</p>
                    </div>
                    <p class="mt-2"><span class="rounded-full bg-terracotta-100 px-2.5 py-1 text-xs font-semibold text-terracotta-700">Vendue</span></p>
                    <dl class="mt-3 flex gap-5 text-sm text-ink/65">
                        <div><dt class="inline">Vues&nbsp;: </dt><dd class="inline font-semibold text-ink/80">154</dd></div>
                        <div><dt class="inline">Messages&nbsp;: </dt><dd class="inline font-semibold text-ink/80">8</dd></div>
                    </dl>
                    <a href="{{ route('articles.create') }}" class="mt-3 inline-block rounded-xl border border-ink/15 px-4 py-2 text-sm font-semibold text-ink">Modifier</a>
                </li>

                <li class="rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold text-ink">Console rétro + 4 manettes</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">60&nbsp;€</p>
                    </div>
                    <p class="mt-2"><span class="rounded-full bg-ink/10 px-2.5 py-1 text-xs font-semibold text-ink/60">Brouillon</span></p>
                    <dl class="mt-3 flex gap-5 text-sm text-ink/65">
                        <div><dt class="inline">Vues&nbsp;: </dt><dd class="inline font-semibold text-ink/80">0</dd></div>
                        <div><dt class="inline">Messages&nbsp;: </dt><dd class="inline font-semibold text-ink/80">0</dd></div>
                    </dl>
                    <a href="{{ route('articles.create') }}" class="mt-3 inline-block rounded-xl border border-ink/15 px-4 py-2 text-sm font-semibold text-ink">Modifier</a>
                </li>

                <li class="rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display font-semibold text-ink">Étagère en bois massif</h3>
                        <p class="shrink-0 font-semibold text-terracotta-600">35&nbsp;€</p>
                    </div>
                    <p class="mt-2"><span class="rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">En ligne</span></p>
                    <dl class="mt-3 flex gap-5 text-sm text-ink/65">
                        <div><dt class="inline">Vues&nbsp;: </dt><dd class="inline font-semibold text-ink/80">71</dd></div>
                        <div><dt class="inline">Messages&nbsp;: </dt><dd class="inline font-semibold text-ink/80">2</dd></div>
                    </dl>
                    <a href="{{ route('articles.create') }}" class="mt-3 inline-block rounded-xl border border-ink/15 px-4 py-2 text-sm font-semibold text-ink">Modifier</a>
                </li>
            </ul>
        </section>

        <!-- Messages entrants -->
        <!-- TODO: changer avec les infos de la bdd -->
        <section class="mt-10" aria-labelledby="titre-messages">
            <div class="flex flex-wrap items-end justify-between gap-3">
                <h2 id="titre-messages" class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">Messages entrants</h2>
                <span class="text-sm font-semibold text-terracotta-600">3 non lus</span>
            </div>

            <ul class="mt-6 space-y-3">
                <li class="flex gap-3 rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-sage-100 text-sm font-bold text-sage-700" aria-hidden="true">CL</span>
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-x-2 gap-y-1">
                            <h3 class="text-sm font-semibold text-ink">Camille Lefèvre</h3>
                            <span class="text-xs text-ink/50">· Vélo de ville</span>
                            <span class="ml-auto rounded-full bg-terracotta-500 px-2 py-0.5 text-[11px] font-bold text-paper">Non lu</span>
                        </div>
                        <p class="mt-1 truncate text-sm text-ink/65">Bonjour, le vélo est-il toujours disponible&nbsp;? Je peux passer samedi matin.</p>
                        <p class="mt-1 text-xs text-ink/50">il y a 12 min</p>
                    </div>
                </li>

                <li class="flex gap-3 rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-terracotta-100 text-sm font-bold text-terracotta-700" aria-hidden="true">YM</span>
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-x-2 gap-y-1">
                            <h3 class="text-sm font-semibold text-ink">Yannick Moreau</h3>
                            <span class="text-xs text-ink/50">· Chaises en bois</span>
                            <span class="ml-auto rounded-full bg-terracotta-500 px-2 py-0.5 text-[11px] font-bold text-paper">Non lu</span>
                        </div>
                        <p class="mt-1 truncate text-sm text-ink/65">Parfait pour samedi 10 h, je confirme. C'est noté sur mon calendrier.</p>
                        <p class="mt-1 text-xs text-ink/50">il y a 1 h</p>
                    </div>
                </li>

                <li class="flex gap-3 rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft">
                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-amber-100 text-sm font-bold text-amber-700" aria-hidden="true">FD</span>
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-x-2 gap-y-1">
                            <h3 class="text-sm font-semibold text-ink">Fatou Diallo</h3>
                            <span class="text-xs text-ink/50">· Étagère en bois</span>
                            <span class="ml-auto rounded-full bg-terracotta-500 px-2 py-0.5 text-[11px] font-bold text-paper">Non lu</span>
                        </div>
                        <p class="mt-1 truncate text-sm text-ink/65">Bonjour, accepteriez-vous 30&nbsp;€ si je la récupère ce soir après le travail&nbsp;?</p>
                        <p class="mt-1 text-xs text-ink/50">hier, 18 h 42</p>
                    </div>
                </li>
            </ul>

            <p class="mt-4">
                <a href="{{ route('articles.show', 1) }}" class="text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Ouvrir la messagerie <span aria-hidden="true">→</span></a>
            </p>
        </section>

        <section class="mt-10 rounded-2xl border border-terracotta-200 bg-terracotta-50 p-5">
            <h2 class="font-display text-lg font-bold text-terracotta-800">Se désinscrire</h2>
            <p class="mt-1 text-sm text-terracotta-700">Supprime définitivement ton compte.</p>
            <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4 flex flex-col gap-3 sm:flex-row sm:items-end">
                @csrf
                @method('DELETE')
                <div class="flex-1">
                    <label for="delete-password-seller" class="mb-1.5 block text-sm font-semibold text-ink">Mot de passe</label>
                    <input id="delete-password-seller" name="password" type="password" required
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
