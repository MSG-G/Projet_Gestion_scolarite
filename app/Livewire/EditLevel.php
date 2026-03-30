<?php

namespace App\Livewire;

use Livewire\Component;
          // ← corrige le nom du modèle (singulier + majuscule)
use App\Models\Level;

class EditLevel extends Component
{
    public Level $level;           // ← typé + public

    // fields can be null initially, especially when model data is missing
    public ?string $code = '';
    public ?string $libelle = '';
    public ?int $scolarite = null;

    /**
     * Injection automatique du modèle via le paramètre de route {level}
     */
    public function mount(Level $level)
    {
        $this->level = $level;


        // Remplit les champs du formulaire
        $this->code      = $level->code ?? '';
        $this->libelle   = $level->libelle ?? '';
        $this->scolarite = $level->scolarite;
    }


    protected function rules()
    {
        return [
            'code'      => 'required|string|max:10|unique:levels,code,' . ($this->level->id ?? ''),
            'libelle'   => 'required|string|max:100',
            'scolarite' => 'required|integer|min:0',
        ];
    }

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

    public function update()
    {
        $this->validate();

        $this->level->update([
            'code'      => $this->code,
            'libelle'   => $this->libelle,
            'scolarite' => $this->scolarite,
        ]);

        session()->flash('success', 'Niveau mis à jour avec succès !');

        return $this->redirectRoute('niveaux', navigate: true);
    }

    public function render()
    {
        return view('livewire.edit-level');
    }
}