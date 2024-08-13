<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstrategiaRequest extends FormRequest
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
            'dsEstrategia' => 'required|string|max:255',
            'nrPrioridade' => 'required|integer',
            'horarios' => 'required|array',
            'horarios.*.dsHorarioInicio' => 'required|string|max:5',
            'horarios.*.dsHorarioFinal' => 'required|string|max:5',
            'horarios.*.nrPrioridade' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'Campo Obrigatório!',
            '*.string' => 'O campo deve ser uma string!',
            '*.integer' => 'O campo deve ser um número inteiro!',
            '*.array' => 'O campo "Horários" deve ser um array!',

            'dsEstrategia.max' => 'O campo "Descrição da Estratégia" não pode ter mais que 255 caracteres!',
            
            'horarios.*.max' => 'O campo não pode ter mais que 5 caracteres!',
        ];
    }
}
