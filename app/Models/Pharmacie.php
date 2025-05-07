<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacie extends Model
{
    protected $table = 'pharmacies';
    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'email',
        'latitude',
        'longitude',
    ];
    public function administrateur()
    {
        return $this->hasMany(Administrateur::class);
    }
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
    public function commande()
    {
        return $this->hasMany(Commande::class);
    }
   
}
