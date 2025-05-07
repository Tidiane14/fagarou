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
        return $this->hasMany(Administrateur::class,'id_administarteur');
    }
    public function stock()
    {
        return $this->hasMany(Stock::class,'id_stock');
    }
    public function commande()
    {
        return $this->hasMany(Commande::class,'id_comande');
    }
   
}
