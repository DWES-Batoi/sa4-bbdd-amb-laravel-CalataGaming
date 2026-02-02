<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JugadoraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'min:3', 'max:255'],
            'dorsal' => ['required', 'integer', 'min:0'],
            'equip_id' => ['required', 'exists:equips,id'],
            'data_naixement' => ['required', 'date'],
            'foto' => ['nullable', 'string', 'max:255'],
        ];
    }
}
