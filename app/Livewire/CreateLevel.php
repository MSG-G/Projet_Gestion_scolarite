<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Level;          // modèle renommé
use App\Models\SchoolYear;     // modèle renommé

class CreateLevel extends Component
{
    public string $code = '';
    public string $libelle = '';
    public ?int $scolarite = null;   // Peut être null avant saisie

    // Règles de validation (plus claires et typées)
    protected $rules = [
        'code'      => 'required|string|max:10|unique:levels,code',
        'libelle'   => 'required|string|max:100',
        'scolarite' => 'required|integer|min:0',
    ];

    // Messages personnalisés (corrigés : "Le champ" au lieu de "Le champs")
    protected $messages = [
        'code.required'      => 'Le champ code est requis.',
        'code.max'           => 'Le code ne peut pas dépasser 10 caractères.',
        'code.unique'        => 'Ce code existe déjà pour un autre niveau.',
        'libelle.required'   => 'Le champ libellé est requis.',
        'libelle.max'        => 'Le libellé ne peut pas dépasser 100 caractères.',
        'scolarite.required' => 'Le champ scolarité est requis.',
        'scolarite.integer'  => 'La scolarité doit être un nombre entier.',
        'scolarite.min'      => 'La scolarité ne peut pas être négative.',
    ];

    public function store()
    {
        // Récupère l'année scolaire active (ou échoue si aucune)
        $yearActu = SchoolYear::where('active', 1)->firstOrFail();

        // Validation
        $validated = $this->validate();

        // Création (méthode correcte : Level::create())
        Level::create([
            'code'          => $validated['code'],
            'libelle'       => $validated['libelle'],
            'scolarite'     => $validated['scolarite'],
            'school_year_id' => $yearActu->id,
            // 'created_by' => auth()->id(),   ← si tu as un champ created_by
        ]);

        session()->flash('success', 'Niveau créé avec succès !');

        // Redirection avec Livewire (navigate:true pour historique)
        return $this->redirectRoute('niveaux', navigate: true);
    }

    public function render()
    {
        return view('livewire.create-level');
    }
}