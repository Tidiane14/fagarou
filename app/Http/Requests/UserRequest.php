<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name"=> "le nom est obligatoire",
            "email"=> "l'email est obligatoire",
            "password"=> "le mot de passe ne peut contenir que 8 caractères",
            "prenom"=> "le prenom est obligatoire",
            "date_naissance"=> "la date de naissance est obligatoire",
            "adresse"=> "l'adresse est obligatoire",
            "telephone"=> "le telephone est obligatoire",
            "photo"=> "la photo est obligatoire",
        ];
    }
}
