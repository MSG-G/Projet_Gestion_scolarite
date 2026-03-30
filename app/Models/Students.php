<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'nom',
        'matricule',
        'prenom',
        'dateNaissance',
        'contact_parent'
    ];

}
