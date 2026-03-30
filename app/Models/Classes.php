<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    // ← Ajoute ou modifie cette ligne
    protected $fillable = [
        'libelle',
        'level_id',
        
    ];

    // Optionnel : relation avec le niveau
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}