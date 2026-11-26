<?php

namespace App\Http\Controllers;

use App\Enums\RequestStatus;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Request as Demande;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RequestsController extends Controller
{
        private const PAR_PAGE = 6;

    // Liste des demandes, filtrée selon les paramètres de l'URL
    public function index(Request $request): View {
        // Par défaut, seules les demandes ouvertes sont affichées
        $filters = $request->all() + ['statut' => [RequestStatus::Open->value]];

        return view('Articles.request_list', [
            'statutsActifs' => (array) $filters['statut'],
            ...Demande::listingMeta(),
        ]);
    }

    public function create(): View
    {
        return view('Articles.request_adding');
    }
}
