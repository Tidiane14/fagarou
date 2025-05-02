<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validation des données avec tous vos champs
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'prenom' => 'nullable|string|max:255',  // Ajoutez 'required' si obligatoire
            'date_naissance' => 'nullable|date',    // Ajoutez 'required' si obligatoire
            'adresse' => 'nullable|string|max:255', // Ajoutez 'required' si obligatoire
            'telephone' => 'nullable|string|max:20', // Ajoutez 'required' si obligatoire
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Pour gérer les fichiers uploadés (photo)
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Création de l'utilisateur avec tous les champs
        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'photo' => $photoPath,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Connexion automatique après inscription
        Auth::login($user);

        // Redirection vers la page d'accueil
        return redirect()->route('home');
    }
}