<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivreursRequest;
use App\Models\Livreur;

class LivreurController extends Controller
{
    public function create()
    {
        return view('livreur.create');
    }

    public function store(LivreursRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }
        Livreur::create($data);
        return redirect()->back()->with('success', 'Livreur créé avec succès.');
    }
}
