<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivreursRequest extends FormRequest
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
            'nom' => 'le nom est obligatoire',
            'prenom' => 'le prenom est obligatoire',
            'date_naissance' => 'la date de naissance est obligatoire',
            'adresse' => 'l\'adresse est obligatoire',
            'telephone' => 'le telephone est obligatoire',
            'photo' => 'l\'image n\'est pas obligatoire',
            'email' => 'l\'email est obligatoire',
            'password' => 'le mot de passe ne peut contenir que 8 caracteres',
            'telephone' => 'le telephone est obligatoire',
            'photo' => 'la photo n\'est pas obligatoire',
        ];
    }
}
