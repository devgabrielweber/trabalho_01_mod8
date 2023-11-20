<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RamalUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:20'],
            'telefone' => ['required', 'string'],
            'responsavel' => ['required', 'string', 'max:150'],
        ];
    }
}
