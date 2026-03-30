<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SchoolYear;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class CreateSchoolYear extends Component
{
    public string $libelle = '';

    protected array $rules = [
        'libelle' => 'required|string|max:255|unique:school_years,school_year',
    ];

    protected array $messages = [
        'libelle.required' => 'Le champ libellé est obligatoire.',
        'libelle.unique'   => 'Cette année scolaire existe déjà.',
    ];

    public function render()
    {
        return view('livewire.create-school-year');
        
    }

    public function store(): void
    {
        $this->validate();

        $currentYear = Carbon::now()->year;

        // Vérifier s'il existe déjà une année pour l'année en cours
        $exists = SchoolYear::where('current_year', $currentYear)->exists();

        if ($exists) {
            session()->flash(
                'error',
                "Une année scolaire pour l'année {$currentYear} existe déjà."
            );
            
        }

        SchoolYear::create([
            'school_year'  => $this->libelle,
            'current_year' => $currentYear,
            'active'       => false,
        ]);
        // redriger a la page d'acceuil avec le message success
        session()->flash('success', 'Année scolaire créée avec succès.');
        $this->RedirectRoute('settings',navigate:true);
    }
}