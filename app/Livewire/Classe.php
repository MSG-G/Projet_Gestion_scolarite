<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Classes;
use App\Models\Level;
use Symfony\Component\HttpFoundation\Session\Session;

class Classe extends Component
{
    public $search = '';

    public function deleteConfirmed($id){
        $classes = Classes::findOrFail($id);
        $classes->delete();
        session()->flash('success', 'la classe a ete supprime avec success 😊');

        $this->ResetPage();

    }

    public function render()
    {
        $classes = Classes::query()
        ->whereAny(['libelle'], 'like', "%{$this->search}%")
        ->latest('id')
        ->paginate(3);

        $niveau = Level::orderBy('libelle')->get(['id', 'libelle','scolarite']);

        

        return view('livewire.classe', compact('classes','niveau'));
    }
}
