<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Medicament;
use App\Models\User;

class Ordonnance extends Model
{
    //
    protected $fillable = [
        'id',
        'date_creation',
        'imageUrl',
        'id_user',
        'id_medoc',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function medicaments()
    {
        return $this->hasMany(Medicament::class);
    }
}
