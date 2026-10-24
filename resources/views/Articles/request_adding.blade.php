<!-- TODO: A adapter dans le futur selon les modèles et controleur-->
@extends("layout.app")
@section("content")
    <!-- ============================ BANDEAU + FIL D'ARIANE ============================ -->
    <section class="border-b border-ink/10 bg-cream">
        <div class="mx-auto max-w-3xl px-4 py-8 sm:py-10">
            <nav aria-label="Fil d'Ariane">
                <ol class="flex flex-wrap items-center gap-x-2 gap-y-1 text-sm text-ink/60">
                    <li><a href="accueil.html" class="hover:text-terracotta-600">Accueil</a></li>
                    <li aria-hidden="true">›</li>
                    <li><a href="demandes.html" class="hover:text-terracotta-600">Demandes</a></li>
                    <li aria-hidden="true">›</li>
                    <li aria-current="page" class="font-medium text-ink">Nouvelle demande</li>
                </ol>
            </nav>

            <div class="mt-5 flex items-start gap-3 rounded-2xl border border-sage-200 bg-sage-50 p-4">
                <span class="text-sage-600" aria-hidden="true">🌱</span>
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
        <form action="demandes.html" method="get" class="space-y-6">

            <!-- Encart d'aide -->
            <div class="flex items-start gap-3 rounded-2xl border border-sage-200 bg-sage-50 p-4">
                <span class="text-lg leading-none text-sage-600" aria-hidden="true">ⓘ</span>
                <p class="text-sm leading-relaxed text-sage-800">
                    Plus ta demande est précise, plus les vendeurs peuvent te répondre utilement.
                </p>
            </div>

            <!-- Titre + description -->
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <div>
                    <label for="titre" class="block text-sm font-semibold text-ink">Titre de la demande</label>
                    <input id="titre" name="titre" type="text" required placeholder="Ex. : poussette double compacte"
                           class="mt-2 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:ring-terracotta-400">
                    <p class="mt-1.5 text-xs text-ink/55">Une phrase courte&nbsp;: l'objet, la taille, l'usage principal.</p>
                </div>

                <div class="mt-5">
                    <label for="description" class="block text-sm font-semibold text-ink">Description</label>
                    <textarea id="description" name="description" rows="5" required
                              placeholder="Ce que tu cherches précisément : modèle, dimensions, état acceptable, ce que tu refuses…"
                              class="mt-2 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm leading-relaxed text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:ring-terracotta-400"></textarea>
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
                            <input id="budget" name="budget" type="number" min="0" step="5" placeholder="80"
                                   class="w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink placeholder:text-ink/45 focus:border-terracotta-400 focus:ring-terracotta-400">
                            <span class="shrink-0 text-sm font-semibold text-ink/60" aria-hidden="true">€</span>
                        </div>
                        <p class="mt-1.5 text-xs text-ink/55">Indique le prix le plus haut que tu acceptes.</p>
                    </div>

                    <div>
                        <label for="categorie" class="block text-sm font-semibold text-ink">Catégorie</label>
                        <select id="categorie" name="categorie"
                                class="mt-2 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink/80 focus:border-terracotta-400 focus:ring-terracotta-400">
                            <option>Choisir une catégorie</option>
                            <option>Maison &amp; meubles</option>
                            <option>Vélos &amp; vélocipédie</option>
                            <option>Enfants &amp; puériculture</option>
                            <option>Loisirs &amp; jeux</option>
                            <option>Électroménager</option>
                            <option>Vêtements</option>
                            <option>Livres &amp; scolaire</option>
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
                        <input id="date" name="date" type="date" value="2026-06-15"
                               class="mt-2 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink focus:border-terracotta-400 focus:ring-terracotta-400">
                        <p class="mt-1.5 text-xs text-ink/55">Avant laquelle tu as besoin de l'objet.</p>
                    </div>

                    <div>
                        <label for="quartier" class="block text-sm font-semibold text-ink">Quartier de remise</label>
                        <select id="quartier" name="quartier"
                                class="mt-2 w-full rounded-xl border border-ink/15 bg-cream px-4 py-3 text-sm text-ink/80 focus:border-terracotta-400 focus:ring-terracotta-400">
                            <option>Quartier des Tilleuls</option>
                            <option>Centre-ville</option>
                            <option>Faubourg Nord</option>
                            <option>Rue des Écoles</option>
                        </select>
                        <p class="mt-1.5 text-xs text-ink/55">Le quartier dans lequel tu peux récupérer l'objet.</p>
                    </div>
                </div>
            </div>

            <!-- Contact -->
            <fieldset class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <legend class="px-1 text-sm font-semibold text-ink">Je préfère être contacté par messagerie</legend>
                <p class="text-xs text-ink/55">Les propositions arriveront ici&nbsp;; tu choisis ce que tu partages ensuite.</p>

                <div class="mt-4 space-y-3">
                    <label for="contact-messagerie" class="flex items-start gap-3 rounded-xl border border-ink/10 bg-cream p-4 cursor-pointer">
                        <input id="contact-messagerie" name="contact" type="radio" value="messagerie" checked
                               class="mt-0.5 h-4 w-4 border-ink/25 text-terracotta-500 focus:ring-terracotta-400">
                        <span>
                            <span class="block text-sm font-semibold text-ink">Messagerie du site</span>
                            <span class="mt-0.5 block text-xs leading-relaxed text-ink/60">Tes coordonnées restent privées&nbsp;: tu réponds depuis ton tableau de bord.</span>
                        </span>
                    </label>

                    <label for="contact-email" class="flex items-start gap-3 rounded-xl border border-ink/10 bg-cream p-4 cursor-pointer">
                        <input id="contact-email" name="contact" type="radio" value="email"
                               class="mt-0.5 h-4 w-4 border-ink/25 text-terracotta-500 focus:ring-terracotta-400">
                        <span>
                            <span class="block text-sm font-semibold text-ink">Adresse e-mail</span>
                            <span class="mt-0.5 block text-xs leading-relaxed text-ink/60">camille.tilleuls@example.fr — visible par les personnes qui te répondent.</span>
                        </span>
                    </label>
                </div>
            </fieldset>

            <!-- Actions -->
            <div class="rounded-2xl border border-ink/10 bg-paper p-5 shadow-soft sm:p-6">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                    <a href="demandes.html" class="rounded-xl bg-terracotta-500 px-6 py-3 text-center text-sm font-semibold text-paper shadow-soft transition hover:bg-terracotta-600">
                        Publier la demande
                    </a>
                    <a href="demandes.html" class="rounded-xl border border-ink/15 bg-paper px-6 py-3 text-center text-sm font-semibold text-ink transition hover:border-ink/30">
                        Annuler
                    </a>
                </div>
                <p class="mt-4 flex items-center gap-2 text-xs text-ink/55">
                    <span class="text-sage-600" aria-hidden="true">✓</span>
                    Ta demande reste visible 30 jours.
                </p>
            </div>

        </form>
    </section>
@endsection
