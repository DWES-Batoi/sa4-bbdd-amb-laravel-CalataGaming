<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'estadi_id' => ['required', 'exists:estadis,id'],
            'titols' => ['nullable', 'integer', 'min:0'],
            'escut' => ['nullable', 'string', 'max:255'],
        ];
    }
}
