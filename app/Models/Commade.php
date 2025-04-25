<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commade extends Model
{
    protected $fillable=[
        'statut',
        'montant',
        'id_pharmacie',
        'id_user',
        'id_paiement',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function pharmacie()
    {
        return $this->belongsTo(Pharmacie::class, 'id_pharmacie');
    }
    public function paiement()
    {
        return $this->belongsTo(Paiement::class, 'id_paiement');
    }
}
