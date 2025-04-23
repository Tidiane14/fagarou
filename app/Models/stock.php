<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $table = 'stock';
    protected $fillable = ['id_pharmacie', 'quantite', 'date_mis_a_jour'];

    public function pharmacie()
    {
        return $this->belongsTo('App\Models\pharmacie', 'id_pharmacie');
    }
}
