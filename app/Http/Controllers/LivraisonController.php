<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class livraisonController extends Controller
{
public function showLivraison()
{
    // Logique pour afficher la page de livraison
    return view('livraison.livraison');
}   
}
