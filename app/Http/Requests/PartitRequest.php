<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'local_id' => ['required', 'exists:equips,id'],
            'visitant_id' => ['required', 'exists:equips,id', 'different:local_id'],
            'estadi_id' => ['required', 'exists:estadis,id'],
            'data' => ['required', 'date'],
            'jornada' => ['required', 'integer', 'min:1'],
            'gols' => ['nullable', 'string', 'max:255'], // En controlador era string
        ];
    }
}
