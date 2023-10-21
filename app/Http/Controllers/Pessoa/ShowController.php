<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Resources\PessoaResource;
use App\Models\Pessoa;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowController extends Controller
{
    public function __invoke(Pessoa $pessoa): JsonResource
    {
        return new PessoaResource($pessoa);
    }
}
