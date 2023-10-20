<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PessoaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'apelido'    => $this->apelido,
            'nome'       => $this->nome,
            'nascimento' => $this->nascimento,
            'stack'      => $this->stack ?? [],
        ];
    }
}
