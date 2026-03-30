<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    // Laravel will map this to table 'school_years' automatically
    protected $table = 'school_years';

    protected $fillable = [
        'school_year',
        'current_year',
        'active',
    ];
}
