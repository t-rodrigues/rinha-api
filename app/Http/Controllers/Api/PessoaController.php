<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\{StoreRequest, UpdateRequest};
use App\Http\Resources\PessoaResource;
use App\Models\Pessoa;
use App\Services\PessoaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

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
            ->setStatusCode(JsonResponse::HTTP_CREATED)
            ->header('Location', route('pessoas.show', ['pessoa' => $pessoa->id]));
    }

    public function show(Pessoa $pessoa): JsonResource
    {
        return PessoaResource::make($pessoa);
    }

    public function update(Pessoa $pessoa, UpdateRequest $request): JsonResource
    {
        $pessoa = $this->service->update($pessoa, $request->validated());

        return PessoaResource::make($pessoa);
    }

    public function destroy(Pessoa $pessoa): JsonResponse
    {
        $this->service->delete($pessoa);

        return response()->json(status: JsonResponse::HTTP_NO_CONTENT);
    }
}
