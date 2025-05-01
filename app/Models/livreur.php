<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class livreur extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'adresse',
        'telephone',
        'photo',
        'email',
        'password',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
    public function livraison()
    {
        return $this->hasMany(Livraison::class);
    }

}
