<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\SchoolYear;
use Carbon\Carbon;


class SchoolYearsController extends Controller
{
    

    

    public function index()
    {
        return view('settings.index');
        
    }
    public function create()
    {
        return view('settings.create');
    }
    
}
