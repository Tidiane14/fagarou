<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable=[
        'id',
        'montant',
        'mode_paiement',
        'statut_paiement',
    ];
    public function commande(){
        return $this->hasMany(Commande::class);
    }
}
