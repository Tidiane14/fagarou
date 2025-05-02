<?php

namespace App\Http\Controllers\medicament;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicament;

class MedicamentController extends Controller
{
    /**
     * Afficher la liste des médicaments
     */
    public function index()
    {
        $medicaments = Medicament::all();
        return view('medicament.medicament', compact('medicaments'));
    }

    /**
     * Afficher les détails d'un médicament spécifique
     */
    public function show($id)
    {
        $medicament = Medicament::findOrFail($id);
        return view('medicament.detail', compact('medicament'));
    }

    /**
     * Ajouter un médicament au panier (pour AJAX)
     */
    public function addToCart(Request $request)
    {
        $id = $request->input('id');
        $medicament = Medicament::findOrFail($id);
        
        // Logique d'ajout au panier (à implémenter selon votre système)
        // Par exemple, avec une session:
        $cart = session()->get('cart', []);
        
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $medicament->nom_medicament,
                'price' => $medicament->prix,
                'quantity' => 1,
                'image' => $medicament->image
            ];
        }
        
        session()->put('cart', $cart);
        
        return response()->json(['success' => true, 'message' => 'Produit ajouté au panier']);
    }
}