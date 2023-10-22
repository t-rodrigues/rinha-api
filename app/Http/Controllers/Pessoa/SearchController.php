<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Resources\PessoaResource;
use App\Models\Pessoa;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\{JsonResponse, Request};

class SearchController extends Controller
{
    public function __invoke(Request $request): JsonResource|JsonResponse
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

        return PessoaResource::collection($searchResult);
    }
}
