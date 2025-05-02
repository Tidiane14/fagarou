<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StocksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer|min:1',
            'prix' => 'required|numeric|min:0',
            'date_expiration' => 'required|date|after_or_equal:today',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
