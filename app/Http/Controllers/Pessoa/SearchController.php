<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use Illuminate\Http\{JsonResponse, Request};

class SearchController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $term = $request->query('t');

        if (empty($term)) {
            return response()->json(['error' => 'Query string "t" is required.'], 400);
        }

        $searchResult = Pessoa::where('apelido', 'LIKE', "%{$term}%")
            ->orWhere('nome', 'LIKE', "%{$term}%")
            ->orWhere('stack', 'LIKE', "%{$term}%")
            ->limit(50)
            ->get();

        return response()->json($searchResult);
    }
}
