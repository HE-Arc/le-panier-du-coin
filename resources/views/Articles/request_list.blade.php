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
            <div class="mt-7 flex flex-col gap-3 sm:flex-row sm:items-center">
                <form action="{{ route('requests.index') }}" method="get" class="flex flex-1 flex-col gap-2 rounded-2xl border border-ink/10 bg-paper p-2 shadow-soft sm:flex-row sm:items-center sm:rounded-full">
                    @foreach ($statutsActifs as $statut)
                        <input type="hidden" name="statut[]" value="{{ $statut }}">
                    @endforeach
                    <input type="hidden" name="budget" value="{{ request('budget') }}">
                    <label for="q" class="sr-only">Rechercher une demande</label>
                    <input id="q" name="q" type="search" placeholder="Poussette, vélo, livres…" value="{{ request('q') }}"
                           class="w-full rounded-xl border-0 bg-transparent px-4 py-3 text-sm text-ink placeholder:text-ink/45 focus:ring-0 sm:flex-1">
                    <label for="quartier" class="sr-only">Quartier</label>
                    <select id="quartier" name="quartier" class="rounded-xl border-0 bg-cream px-3 py-3 text-sm text-ink/80 focus:ring-0">
                        <option value="">Tous les quartiers</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location }}" @selected(request('quartier') === $location)>{{ $location }}</option>
                        @endforeach
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
            <form action="{{ route('requests.index') }}" method="get" class="mt-5 flex flex-col gap-4 rounded-2xl border border-ink/10 bg-paper p-4 lg:flex-row lg:items-end lg:justify-between">
                <input type="hidden" name="q" value="{{ request('q') }}">
                <input type="hidden" name="quartier" value="{{ request('quartier') }}">
                <fieldset>
                    <legend class="text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Statut</legend>
                    <div class="mt-2 flex flex-wrap gap-4">
                        @foreach ($statuses as $status)
                            <label for="statut-{{ $status->value }}" class="flex items-center gap-2 text-sm text-ink/75">
                                <input id="statut-{{ $status->value }}" name="statut[]" type="checkbox" value="{{ $status->value }}"
                                       @checked(in_array($status->value, $statutsActifs))
                                       class="h-4 w-4 rounded border-ink/25 text-terracotta-500 focus:ring-terracotta-400">
                                {{ $status->label() }}
                            </label>
                        @endforeach
                    </div>
                </fieldset>

                <div class="lg:w-56">
                    <label for="budget" class="block text-xs font-bold uppercase tracking-[0.12em] text-ink/50">Budget maximum</label>
                    <select id="budget" name="budget" class="mt-2 w-full rounded-xl border border-ink/15 bg-cream px-3 py-2.5 text-sm text-ink/80 focus:border-terracotta-400 focus:ring-terracotta-400">
                        <option value="">Peu importe</option>
                        @foreach ($budgets as $budget)
                            <option value="{{ $budget }}" @selected((string) request('budget') === (string) $budget)>Moins de {{ $budget }} €</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="rounded-xl bg-terracotta-500 px-5 py-2.5 text-sm font-semibold text-paper transition hover:bg-terracotta-600">
                    Filtrer
                </button>
            </form>
        </div>
    </section>

    <!-- ============================ LISTE DES DEMANDES ============================ -->
    <section class="mx-auto max-w-6xl px-4 py-10 sm:py-14">
        <div class="flex flex-wrap items-end justify-between gap-3">
            <h2 class="font-display text-2xl font-bold tracking-tight text-ink sm:text-3xl">
                {{ $demandes->total() }} {{ Str::plural('demande', $demandes->total()) }}
            </h2>
            <p class="text-sm text-ink/60">Triées par date de dépôt</p>
        </div>

        <ul class="mt-7 space-y-4">
            @forelse ($demandes as $demande)
                <li class="flex flex-col gap-4 rounded-2xl border border-ink/10 bg-paper p-4 shadow-soft transition hover:-translate-y-0.5 hover:shadow-lift sm:flex-row sm:items-center sm:p-5">
                    <span class="grid h-14 w-14 shrink-0 place-items-center rounded-full bg-cream text-2xl" aria-hidden="true">img</span>
                    <div class="min-w-0 flex-1">
                        <h3 class="font-display text-lg font-semibold leading-snug text-ink">{{ $demande->title }}</h3>
                        <p class="mt-0.5 truncate text-sm text-ink/60">{{ $demande->description }}</p>
                        <p class="mt-2 text-xs text-ink/55">
                            Cherche pour le {{ $demande->target_date->translatedFormat('j F') }}
                            · {{ $demande->location }}
                            · {{ $demande->answers_count }} {{ Str::plural('réponse', $demande->answers_count) }}
                        </p>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-2 sm:flex-col sm:items-end">
                        <span class="rounded-full bg-sage-100 px-2.5 py-1 text-xs font-semibold text-sage-700">Budget {{ (float) $demande->budget }}&nbsp;€</span>
                        <span class="rounded-full px-2.5 py-1 text-xs font-semibold {{ $demande->status->badgeClasses() }}">{{ $demande->status->label() }}</span>
                        @if ($demande->status !== \App\Enums\RequestStatus::Fulfilled)
                            <a href="{{ route('articles.create') }}" class="mt-1 text-sm font-semibold text-terracotta-600 hover:text-terracotta-700">Proposer cet objet <span aria-hidden="true">→</span></a>
                        @endif
                    </div>
                </li>
            @empty
                <li class="rounded-2xl border border-dashed border-ink/15 bg-paper p-8 text-center text-sm text-ink/60">
                    Aucune demande ne correspond à ta recherche.
                </li>
            @endforelse
        </ul>

        @if ($demandes->hasMorePages())
            <div class="mt-8 flex justify-center">
                <a href="{{ request()->fullUrlWithQuery(['nombre' => $nombreSuivant, 'page' => null]) }}"
                   class="rounded-xl border border-ink/15 bg-paper px-6 py-3 text-sm font-semibold text-ink transition hover:border-ink/30 hover:bg-cream">
                    Charger plus de demandes
                </a>
            </div>
        @endif
    </section>
@endsection
