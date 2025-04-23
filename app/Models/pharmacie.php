<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pharmacie extends Model
{
    protected $table = 'pharmacie';
    protected $primaryKey = 'id_pharmacie';
    public $timestamps = false;

    protected $fillable = [
        'nom',
        'adresse',
        'ville',
        'email',
        'telephone'
    ];
    

    // Define any relationships or additional methods her

    public function administrateur()
    {
        return $this->hasMany(pharmacie::class, 'id_pharmacie');
    }
}
