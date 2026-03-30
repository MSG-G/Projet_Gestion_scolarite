<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Level;


class ListNiveaux extends Component
{
    public $search = '';

    // 1. Méthode déclenchée par le bouton
public function confirmDelete($levelId)
{
    $this->dispatch('confirm-delete', [
        'id'      => $levelId,
        'title'   => 'Supprimer ce niveau ?',
        'message' => 'Cette action est irréversible. Voulez-vous vraiment supprimer ce niveau ?',
        'confirm' => 'Oui, supprimer',
        'cancel'  => 'Annuler',
    ]);
}

// 2. Méthode appelée après confirmation
public function deleteConfirmed($levelId)
{
    $level = Level::findOrFail($levelId);
    $level->delete();

    session()->flash('success', 'Niveau supprimé avec succès !');
    
    // Optionnel : reset la pagination ou rafraîchir
    $this->resetPage(); // si tu utilises WithPagination
}

    public function render()
    {
        $levels = Level::query()
        ->whereAny(['libelle', 'code'], 'like', "%{$this->search}%")
        ->latest('id')
        ->paginate(10);

    
        return view('livewire.list-niveaux', compact('levels'));
    }
}
