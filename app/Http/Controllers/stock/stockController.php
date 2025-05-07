<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class stockController extends Controller
{
    public function index()
    {
        return view('stocks.index');
    }

    public function create()
    {
        return view('stock.create');
    }

    public function store(Request $request)
    {
        // Validation et stockage des données
        // ...
        return redirect()->route('stock.index');
    }

    public function show($id)
    {
        // Afficher un stock spécifique
        // ...
    }

    public function edit($id)
    {
        // Afficher le formulaire d'édition pour un stock spécifique
        // ...
    }

    public function update(Request $request, $id)
    {
        // Mettre à jour les données du stock
        // ...
        return redirect()->route('stock.index');
    }

    public function destroy($id)
    {
        // Supprimer un stock
        // ...
        return redirect()->route('stock.index');
    }
}
