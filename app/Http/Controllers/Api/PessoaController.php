<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\{StoreRequest, UpdateRequest};
use App\Http\Resources\PessoaResource;
use App\Models\Pessoa;
use App\Services\PessoaService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\{JsonResponse, Response};

class PessoaController extends Controller
{
    public function __construct(private readonly PessoaService $service)
    {
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $pessoa = $this->service->store($request->validated());

        return PessoaResource::make($pessoa)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED)
            ->header('Location', route('pessoas.show', ['pessoa' => $pessoa->id]));
    }

    public function show(Pessoa $pessoa): JsonResource
    {
        return PessoaResource::make($pessoa);
    }

    public function update(Pessoa $pessoa, UpdateRequest $request): JsonResource
    {
        $pessoa->fill($request->validated())->save();

        return PessoaResource::make($pessoa->refresh());
    }

    public function destroy(Pessoa $pessoa): Response
    {
        $pessoa->delete();

        return response()->noContent();
    }
}
