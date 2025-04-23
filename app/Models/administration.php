<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class administration extends Model
{
    use HasFactory;

    protected $table = 'administrateur';

    public function index()
    {
        return view('administration.index');
    }

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'role',
        'telephone',
        'id_pharmacie',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
    public function administrateur()
    
    {
        return $this->hasMany(administrateur::class, 'id_user', 'id_user');
        
    }
}
   