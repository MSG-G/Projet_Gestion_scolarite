<?php

namespace App\Livewire;

use App\Models\Students;
use Livewire\Component;
use Livewire\WithPagination;

class StudentList extends Component
{
    public $search = '';
    use WithPagination;


    public function deleteConfirmed($id_student){
        $students = Students::findOrFail($id_student);
        $students -> delete();

        session()->flash('success', 'L\'eleve a ete supprime avec success !');

        $this->resetPage();
    }

    public function render()
    {
        $students = Students::query()
        ->whereAny(['nom','prenom'], 'like', "%{$this->search}%")
        ->latest('id')
        ->paginate(10);

        return view('livewire.student-list',compact('students'));
    }
}
