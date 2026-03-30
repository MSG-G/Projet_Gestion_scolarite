<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    // table name explicit but Laravel would assume 'levels' from class name
    protected $table = 'levels';

    protected $fillable = [
        'code',
        'libelle',
        'scolarite',
        'school_year_id'
    ];
}
