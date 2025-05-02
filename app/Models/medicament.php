<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    
    protected $fillable = [
        'nom_medicament',
        'description',
        'prix',
        'quantite',
        'image',
        'statut',
        'categorie',
        'marque',
        'dosage',
        'effets_secondaires',
        'contre_indications',
        'interactions',
        'precautions',
        'posologie',
        'conservation',
        'date_expiration',
        'date_ajout',
        'date_modification'
    ];
    protected $table = 'medicaments';
    protected $primaryKey = 'id';


    public function stock()
    {
        return $this->belongsTo(Stock::class, 'id_stock');
    }

    public function ordonnance()
    {
        return $this->hasMany(Ordonnance::class);
    }
}
