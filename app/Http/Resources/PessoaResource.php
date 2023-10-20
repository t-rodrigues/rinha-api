<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read string $id
 * @property-read string $apelido
 * @property-read string $nome
 * @property-read string $nascimento
 * @property-read array $stack
 */
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
