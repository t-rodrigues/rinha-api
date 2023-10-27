<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\StoreRequest;
use App\Http\Resources\PessoaResource;
use App\Services\PessoaService;
use Illuminate\Http\{JsonResponse, Response};

class StoreController extends Controller
{
    public function __construct(private readonly PessoaService $service)
    {
    }

    public function __invoke(StoreRequest $request): JsonResponse
    {
        $pessoa = $this->service->store($request->validated());

        return PessoaResource::make($pessoa)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED)
            ->header('Location', route('pessoas.show', ['pessoa' => $pessoa->id]));
    }
}
