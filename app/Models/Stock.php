<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'id_pharmacie',
        'quantity',
        'date_mis_a_jour',
    ];

    public function pharmacie()
    {
        return $this->belongsTo(Pharmacie::class, 'id_pharmacie');
    }
    public function medicaments()
    {
        return $this->hasMany(Medicament::class);
    }
}

