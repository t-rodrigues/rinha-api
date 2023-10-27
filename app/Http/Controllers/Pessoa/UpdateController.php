<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\UpdateRequest;
use App\Http\Resources\PessoaResource;
use App\Models\Pessoa;
use Illuminate\Http\Resources\Json\JsonResource;

class UpdateController extends Controller
{
    public function __invoke(Pessoa $pessoa, UpdateRequest $request): JsonResource
    {
        $pessoa->fill($request->validated());
        $pessoa->save();

        return PessoaResource::make($pessoa->refresh());
    }
}
