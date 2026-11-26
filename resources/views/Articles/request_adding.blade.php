@extends("layout.app")
@section('title', "Déposer une demande")
@section("content")
    <!-- ============================ BANDEAU + FIL D'ARIANE ============================ -->
    <section class="border-b border-ink/10 bg-cream">
        <div class="mx-auto max-w-3xl px-4 py-8 sm:py-10">
            <nav aria-label="Fil d'Ariane">
                <ol class="flex flex-wrap items-center gap-x-2 gap-y-1 text-sm text-ink/60">
                    <li><a href="{{ route('home') }}" class="hover:text-terracotta-600">Accueil</a></li>
                    <li aria-hidden="true">›</li>
                    <li><a href="{{ route('requests.index') }}" class="hover:text-terracotta-600">Demandes</a></li>
                    <li aria-hidden="true">›</li>
                    <li aria-current="page" class="font-medium text-ink">Nouvelle demande</li>
                </ol>
            </nav>

            <div class="mt-5 flex items-start gap-3 rounded-2xl border border-sage-200 bg-sage-50 p-4">
                <p class="text-sm leading-relaxed text-sage-800">
                    Déposer une demande, c'est gratuit et ne t'engage à rien.
                </p>
            </div>

            <h1 class="mt-6 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Déposer une demande</h1>
            <p class="mt-3 text-base leading-relaxed text-ink/70">
                Décris l'objet que tu cherches&nbsp;: les habitants qui l'ont déjà pourront te répondre directement.
            </p>
        </div>
    </section>

    <!-- ============================ FORMULAIRE ============================ -->
    <section class="mx-auto max-w-3xl px-4 py-10">
        <form method="POST" action="{{ route('requests.store') }}" class="space-y-6">
            @csrf

            <!-- Encart d'aide -->
            <div class="flex items-start gap-3 rounded-2xl border border-sage-200 bg-sage-50 p-4">
                <p class="text-sm leading-relaxed text-sage-800">
                    Plus ta demande est précise, plus les vendeurs peuvent te répondre utilement.
                </p>
            </div>

            <!-- Titre + description -->
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <div>
                    <label for="titre" class="block text-sm font-semibold text-ink">Titre de la demande</label>
                    <input id="titre" name="titre" type="text" required maxlength="255" value="{{ old('titre') }}" placeholder="Ex. : poussette double compacte"
                           class="mt-2 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:ring-terracotta-400">
                    <p class="mt-1.5 text-xs text-ink/55">Une phrase courte&nbsp;: l'objet, la taille, l'usage principal.</p>
                </div>

                <div class="mt-5">
                    <label for="description" class="block text-sm font-semibold text-ink">Description</label>
                    <textarea id="description" name="description" rows="5" required maxlength="2000"
                              placeholder="Ce que tu cherches précisément : modèle, dimensions, état acceptable, ce que tu refuses…"
                              class="mt-2 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm leading-relaxed text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:ring-terracotta-400">{{ old('description') }}</textarea>
                    <p class="mt-1.5 text-xs text-ink/55">Exemple&nbsp;: «&nbsp;Poussette double, pliable, pour jumeaux de 8 mois, tissu propre, roues qui roulent bien.&nbsp;»</p>
                </div>
            </div>

            <!-- Budget + catégorie -->
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Ton budget et ta catégorie</p>

                <div class="mt-4 grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="budget" class="block text-sm font-semibold text-ink">Budget maximum</label>
                        <div class="mt-2 flex items-center gap-2">
                            <input id="budget" name="budget" type="number" min="0" step="1" required placeholder="80" value="{{ old('budget') }}"
                                   class="w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:ring-terracotta-400">
                            <span class="shrink-0 text-sm font-semibold text-ink/60" aria-hidden="true">€</span>
                        </div>
                        <p class="mt-1.5 text-xs text-ink/55">Indique le prix le plus haut que tu acceptes.</p>
                    </div>

                    <div>
                        <label for="categorie" class="block text-sm font-semibold text-ink">Catégorie</label>
                        <select id="categorie" name="categorie" required
                                class="mt-2 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink/80 focus:border-terracotta-400 focus:ring-terracotta-400">
                            <option value="">Choisir une catégorie</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('categorie') === $category->id)>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Date + quartier -->
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Quand et où&nbsp;?</p>

                <div class="mt-4 grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="date" class="block text-sm font-semibold text-ink">Date souhaitée</label>
                        <input id="date" name="date" type="date" required min="{{ now()->toDateString() }}" value="{{ old('date') }}"
                               class="mt-2 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink focus:border-terracotta-400 focus:ring-terracotta-400">
                        <p class="mt-1.5 text-xs text-ink/55">Avant laquelle tu as besoin de l'objet.</p>
                    </div>

                    <div>
                        <label for="quartier" class="block text-sm font-semibold text-ink">Quartier de remise</label>
                        <select id="quartier" name="quartier" required
                                class="mt-2 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink/80 focus:border-terracotta-400 focus:ring-terracotta-400">
                            <option value="">Choisir un quartier</option>
                            @foreach ($quartiers as $slug => $label)
                                <option value="{{ $slug }}" @selected(old('quartier', $quartierParDefaut) === $slug)>{{ $label }}</option>
                            @endforeach
                        </select>
                        <p class="mt-1.5 text-xs text-ink/55">Le quartier dans lequel tu peux récupérer l'objet.</p>
                    </div>
                </div>
            </div>

            <!-- Contact -->
            <div class="flex items-start gap-3 rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <span class="text-sage-600" aria-hidden="true">✉</span>
                <div>
                    <p class="text-sm font-semibold text-ink">Les réponses arrivent dans ton tableau de bord</p>
                    <p class="mt-1 text-xs leading-relaxed text-ink/60">
                        Tes coordonnées restent privées&nbsp;: tu vois les propositions dans «&nbsp;Mes demandes&nbsp;» et tu discutes avec les vendeurs via la messagerie du site.
                    </p>
                </div>
            </div>

            <!-- Actions -->
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                    <button type="submit" class="rounded-xl bg-terracotta-500 px-6 py-3 text-center text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">
                        Publier la demande
                    </button>
                    <a href="{{ route('requests.index') }}" class="rounded-xl border border-ink/15 bg-paper px-6 py-3 text-center text-sm font-semibold text-ink transition hover:border-ink/30">
                        Annuler
                    </a>
                </div>
                <p class="mt-4 flex items-center gap-2 text-xs text-ink/55">
                    <span class="text-sage-600" aria-hidden="true">✓</span>
                    Tu pourras la modifier ou la supprimer depuis ton tableau de bord.
                </p>
            </div>

        </form>
    </section>
@endsection
