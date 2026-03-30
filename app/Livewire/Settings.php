<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SchoolYear;
use Livewire\WithPagination;

class Settings extends Component
{
    public $search = '';
    use WithPagination;

    public function toggleStatus($id){
        $year = SchoolYear::findOrFail($id);

        // Inverse simplement 0 ↔ 1
        $year->active = $year->active ? 0 : 1;   // ou : 1 - $year->active

        $year->save();

        // Feedback utilisateur (optionnel mais très apprécié)
        $this->dispatch('notify', [
            'type'    => 'success',
            'message' => 'Statut mis à jour : ' . ($year->active ? 'Actif' : 'Inactif'),
        ]);
    }

    public function render()
{
    $schoolYears = SchoolYear::query()
        ->whereAny(['school_year', 'current_year'], 'like', "%{$this->search}%")
        ->latest('id')
        ->paginate(10);

    return view('livewire.settings', compact('schoolYears'));
}
}
