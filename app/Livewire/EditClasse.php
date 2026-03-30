<?php

namespace App\Livewire;

use App\Models\Level;
use App\Models\Classes;
use Livewire\Component;

class EditClasse extends Component
{
    // attention : le modèle s'appelle "Classes" (pluriel)
    public Classes $classe;

    public $levels = [];
    public ?int $level_id = null;
    public ?string $libelle = '';

    public function mount(Classes $classe){
        $this->classe = $classe;
        $this->libelle = $classe->libelle;
        $this->level_id = $classe->level_id;

        // Charge une seule fois ici
        $this->levels = Level::orderBy('libelle')
            ->get(['id', 'code', 'libelle']);
    }

    // validation rules pulled from CreateClasses (with unique check if needed)
    protected function rules()
    {
        return [
            'libelle'  => 'required|string|max:100',
            'level_id' => 'required|exists:levels,id',
        ];
    }

    public function update()
    {
        $validated = $this->validate();

        $this->classe->update([
            'libelle'  => $validated['libelle'],
            'level_id' => $validated['level_id'],
        ]);

        session()->flash('success', 'La classe a été mise à jour avec succès.');
        return $this->redirectRoute('classes.index', navigate: true);
    }

    public function render()
    {
        // $levels déjà chargé en mount, inutile de requêter à chaque render
        return view('livewire.edit-classe', ['levels' => $this->levels]);
    }
}
