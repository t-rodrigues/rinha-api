<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Resources\PessoaResource;
use App\Services\PessoaService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\{JsonResponse, Request};

class SearchController extends Controller
{
    public function __construct(private readonly PessoaService $service)
    {
    }

    public function __invoke(Request $request): JsonResource|JsonResponse
    {
        $term = $request->query('t');

        if (empty($term)) {
            return response()->json(['error' => 'Query string "t" is required.'], 400);
        }

        $searchResult = $this->service->search($term);

        return PessoaResource::collection($searchResult);
    }
}
