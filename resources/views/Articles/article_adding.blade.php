<!-- TODO: A adapter dans le futur selon les modèles et controleur-->
@extends("layout.app")
@section("content")
    <!-- ============================ TÊTE DE FORMULAIRE ============================ -->
    <section class="border-b border-ink/10 bg-paper">
        <div class="mx-auto max-w-3xl px-4 py-8 sm:py-10">
            <nav aria-label="Fil d'Ariane" class="text-xs text-ink/55">
                <ol class="flex flex-wrap items-center gap-1.5">
                    <li><a href="accueil.html" class="hover:text-terracotta-600">Accueil</a></li>
                    <li aria-hidden="true">›</li>
                    <li aria-current="page" class="font-semibold text-ink/75">Publier une annonce</li>
                </ol>
            </nav>

            <div class="mt-3 flex flex-wrap items-start justify-between gap-3">
                <div>
                    <h1 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">Publier une annonce</h1>
                    <p class="mt-2 text-sm text-ink/65">Étape 1 sur 2 · Tes coordonnées seront visibles par les acheteurs.</p>
                </div>
                <p class="flex items-center gap-1.5 rounded-full border border-sage-200 bg-sage-50 px-3 py-1.5 text-xs font-semibold text-sage-700" role="status">
                    <span class="h-1.5 w-1.5 rounded-full bg-sage-500" aria-hidden="true"></span>
                    Brouillon enregistré
                </p>
            </div>
        </div>
    </section>

    <!-- ============================ FORMULAIRE ============================ -->
    <section class="mx-auto max-w-3xl px-4 py-8">
        <form action="article-detail.html" method="get" class="space-y-6">

            <!-- ---------- Photos ---------- -->
            <fieldset class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <legend class="px-1 font-display text-lg font-semibold text-ink">Photos de l'objet</legend>

                <div class="mt-3 rounded-2xl border-2 border-dashed border-ink/20 bg-cream px-5 py-8 text-center">
                    <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-terracotta-100 text-terracotta-600" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"><path d="M12 16V5m0 0L8 9m4-4 4 4"/><path d="M4 17v1.5A2.5 2.5 0 0 0 6.5 21h11a2.5 2.5 0 0 0 2.5-2.5V17"/></svg>
                    </span>
                    <p class="mt-3 text-sm font-semibold text-ink">Glisse tes photos ici ou clique pour choisir</p>
                    <p class="mt-1 text-xs text-ink/55">JPG ou PNG, 5 Mo maximum par photo · 4 photos au total</p>
                    <label for="photos" class="mt-4 inline-block cursor-pointer rounded-xl border border-ink/15 bg-paper px-4 py-2 text-sm font-semibold text-ink transition hover:border-terracotta-300 hover:text-terracotta-600">
                        Choisir des photos
                    </label>
                    <input id="photos" name="photos" type="file" accept="image/*" multiple class="sr-only">
                </div>

                <div class="mt-4 grid grid-cols-4 gap-3">
                    <figure class="overflow-hidden rounded-xl border border-terracotta-300">
                        <span class="grid aspect-square place-items-center bg-sage-100 text-2xl" aria-hidden="true">🚲</span>
                        <figcaption class="bg-terracotta-50 px-2 py-1.5 text-center text-[10px] font-semibold text-terracotta-700">Couverture</figcaption>
                    </figure>
                    <div class="grid aspect-square place-items-center rounded-xl border border-dashed border-ink/20 bg-cream text-ink/35" aria-hidden="true">
                        <span class="text-xl">+</span>
                    </div>
                    <div class="grid aspect-square place-items-center rounded-xl border border-dashed border-ink/20 bg-cream text-ink/35" aria-hidden="true">
                        <span class="text-xl">+</span>
                    </div>
                    <div class="grid aspect-square place-items-center rounded-xl border border-dashed border-ink/20 bg-cream text-ink/35" aria-hidden="true">
                        <span class="text-xl">+</span>
                    </div>
                </div>
                <p class="mt-3 text-xs text-ink/55">Première photo = photo de couverture.</p>
            </fieldset>

            <!-- ---------- Titre + description ---------- -->
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <div>
                    <label for="titre" class="font-display text-lg font-semibold text-ink">Titre de l'annonce</label>
                    <input id="titre" name="titre" type="text" required maxlength="80" value="Vélo de ville — 3 vitesses"
                           placeholder="Ex. Vélo de ville — 3 vitesses"
                           class="mt-3 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                </div>

                <div class="mt-5">
                    <label for="description" class="font-display text-lg font-semibold text-ink">Description</label>
                    <textarea id="description" name="description" rows="6"
                              placeholder="Décris l'état, la marque, ce qui est fourni…"
                              class="mt-3 w-full resize-y rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm leading-relaxed text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200"></textarea>
                    <p class="mt-1.5 text-xs text-ink/50">Plus la description est précise, plus les acheteurs te contactent en confiance.</p>
                </div>
            </div>

            <!-- ---------- Prix ---------- -->
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <div class="min-w-[10rem] flex-1">
                        <label for="prix" class="font-display text-lg font-semibold text-ink">Prix</label>
                        <div class="mt-3 flex items-stretch">
                            <input id="prix" name="prix" type="number" inputmode="numeric" min="0" step="1" value="45"
                                   placeholder="0"
                                   class="w-full rounded-l-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                            <span class="grid place-items-center rounded-r-xl border border-l-0 border-ink/15 bg-cream px-4 text-sm font-semibold text-ink/60" aria-hidden="true">€</span>
                        </div>
                    </div>

                    <label class="flex items-center gap-2.5 pb-3 text-sm text-ink/75">
                        <input type="checkbox" name="negociation" class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                        Prix à la négociation
                    </label>
                </div>
            </div>

            <!-- ---------- Catégorie + état ---------- -->
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <div>
                    <label for="categorie" class="font-display text-lg font-semibold text-ink">Catégorie</label>
                    <select id="categorie" name="categorie" class="mt-3 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink/80 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                        <option>Choisis une catégorie…</option>
                        <option>Maison &amp; meubles</option>
                        <option selected>Vélos &amp; vélocipédie</option>
                        <option>Loisirs &amp; jeux</option>
                        <option>Électroménager</option>
                        <option>Vêtements</option>
                        <option>Livres</option>
                    </select>
                </div>

                <fieldset class="mt-5">
                    <legend class="font-display text-lg font-semibold text-ink">État</legend>
                    <div class="mt-3 flex flex-col gap-2.5 sm:flex-row sm:gap-6">
                        <label class="flex items-center gap-2.5 text-sm text-ink/75">
                            <input type="radio" name="etat" value="neuf" class="h-4 w-4 border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                            Neuf
                        </label>
                        <label class="flex items-center gap-2.5 text-sm text-ink/75">
                            <input type="radio" name="etat" value="tres-bon" checked class="h-4 w-4 border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                            Très bon
                        </label>
                        <label class="flex items-center gap-2.5 text-sm text-ink/75">
                            <input type="radio" name="etat" value="correct" class="h-4 w-4 border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                            Correct
                        </label>
                    </div>
                </fieldset>
            </div>

            <!-- ---------- Quartier + disponibilité ---------- -->
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <div>
                    <label for="quartier" class="font-display text-lg font-semibold text-ink">Quartier</label>
                    <select id="quartier" name="quartier" class="mt-3 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink/80 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                        <option>Centre-ville</option>
                        <option selected>Quartier des Tilleuls</option>
                        <option>Faubourg Nord</option>
                        <option>Rue des Écoles</option>
                    </select>
                </div>

                <div class="mt-5">
                    <label for="disponibilite" class="font-display text-lg font-semibold text-ink">Disponibilité pour la remise</label>
                    <input id="disponibilite" name="disponibilite" type="text"
                           placeholder="Ex. en semaine après 18 h"
                           class="mt-3 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:outline-none focus:ring-2 focus:ring-terracotta-200">
                </div>
            </div>

            <!-- ---------- Certification ---------- -->
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <label class="flex items-start gap-3 text-sm leading-relaxed text-ink/75">
                    <input type="checkbox" name="certification" required class="mt-0.5 h-4 w-4 shrink-0 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-300">
                    <span>Je certifie que cet objet est autorisé à la vente et que les photos sont les miennes.</span>
                </label>
            </div>

            <!-- ---------- Actions ---------- -->
            <div class="flex flex-col gap-3 border-t border-ink/10 pt-6 sm:flex-row sm:items-center">
                <button type="submit" class="rounded-xl bg-terracotta-500 px-6 py-3 text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600 sm:flex-1">
                    Publier l'annonce
                </button>
                <button type="button" class="rounded-xl border border-ink/15 bg-paper px-6 py-3 text-sm font-semibold text-ink transition hover:border-ink/30 sm:flex-1">
                    Enregistrer le brouillon
                </button>
                <a href="accueil.html" class="text-center text-sm font-semibold text-ink/60 hover:text-terracotta-600 sm:px-4">Annuler</a>
            </div>
        </form>
    </section>
@endsection
