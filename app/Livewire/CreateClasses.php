<?php

namespace App\Livewire;

use App\Models\Classes;
use App\Models\Level;
use App\Models\school_years;
use Livewire\Component;

class CreateClasses extends Component
{

    public $levels = [];
    public ?int $level_id = null;
    public $libelle = '';

    protected $rules = [
        'libelle' => 'required|string|max:100',
        'level_id' => 'required|exists:levels,id'
    ];

    protected $messages = [
        'libelle.required' => 'le champs libelle est requis',
        'libelle.max' => 'le champs libelle ne peut pas depasser plus de 100 caracteres'
    ];

    public function mount(){
        $this->levels = Level::orderBy('libelle')
            ->get(['id', 'libelle', 'code']);
    }

    public function store(){
        

        Classes::create([
            'libelle' => $this->libelle,
            'level_id' => $this->level_id
        ]);
        session()->flash('success', 'la classe a ete cree avec success !!!');
        return $this->redirectRoute('classes.index',navigate:true);
    }


    public function render()
    {
        
        return view('livewire.create-classes');
    }
}
