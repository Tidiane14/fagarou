<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    protected $fillable = [
        'id_commande',
        'id_livreur',
        'adresse_livraison',
        'date_livraison',
        'statut_livraison',
        'frais_livraison',
    ];

    public function livreur()
    {
        return $this->belongsTo(Livreur::class, 'id_livreur');
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'id_commande');
    }
}
