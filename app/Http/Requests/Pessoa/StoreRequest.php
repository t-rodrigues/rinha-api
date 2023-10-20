<?php

namespace App\Http\Requests\Pessoa;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property-read string $apelido
 * @property-read string $nome
 * @property-read string $nascimento
 * @property-read array $stack
 */
class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'apelido'    => 'required|unique:pessoas|max:32',
            'nome'       => 'required|max:100',
            'nascimento' => 'required|date',
            'stack'      => 'nullable|array',
            'stack.*'    => 'string|max:32',
        ];
    }
}
