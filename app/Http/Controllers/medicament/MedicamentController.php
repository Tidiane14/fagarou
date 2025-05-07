<?php

namespace App\Http\Controllers\medicament;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicament;

class MedicamentController extends Controller
{

    /**Afficher le formulaire d'ajout de médicaments */
    public function create()
{
    return view('medicament.create');
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'nom_medicament' => 'required|string|max:255',
        'description' => 'nullable|string',
        'prix' => 'required|numeric',
        'quantite' => 'required|integer',
        'image' => 'nullable|string',
        // ajoute les autres champs ici...
    ]);

    Medicament::create($validated);

    return redirect()->route('medicaments.index')->with('success', 'Médicament ajouté avec succès.');

    }

    public function edit($id)
{
    $medicament = Medicament::findOrFail($id);
    return view('medicament.edit', compact('medicament'));
}

    public function update(Request $request, $id)
    {
        $medicament = Medicament::findOrFail($id);

        $validated = $request->validate([
            'nom_medicament' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
            'image' => 'nullable|string',
            // autres champs
        ]);

        $medicament->update($validated);

        return redirect()->route('medicaments.index')->with('success', 'Médicament mis à jour avec succès.');
    }

    public function destroy($id)
{
    $medicament = Medicament::findOrFail($id);
    $medicament->delete();

    return redirect()->route('medicaments.index')->with('success', 'Médicament supprimé avec succès.');
   }




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