<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\StoreRequest;
use App\Http\Resources\PessoaResource;
use App\Models\Pessoa;
use Illuminate\Http\JsonResponse;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request): JsonResponse
    {
        $pessoa = Pessoa::create($request->validated());

        return (new PessoaResource($pessoa))
            ->response()
            ->setStatusCode(201)
            ->header('Location', route('pessoas.show', ['pessoa' => $pessoa->id]));
    }
}
