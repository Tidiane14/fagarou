<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    use HasFactory;

    protected $table = 'administrateurs';

    protected $fillable = [
        'nom',
        'role',
        'mot_de_passe',
        'id_pharmacie',
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    /**
     * Relation avec la pharmacie (chaque administrateur appartient à une pharmacie)
     */
    public function pharmacie()
    {
        return $this->belongsTo(Pharmacie::class, 'id_pharmacie');
    }
}
