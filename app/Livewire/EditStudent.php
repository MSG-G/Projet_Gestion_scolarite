<?php

namespace App\Livewire;

use App\Models\Students;
use Livewire\Component;

class EditStudent extends Component
{

    public Students $students;

    public ?string $nom = '';
    public ?string $prenom = '';
    public ?string $matricule = '';
    public ?string $dateNaissance = null;
    public ?string $contact_parent = '';
    


    public function mount(Students $students){
        
    $this->students = $students;
        
        $this->nom = $students->nom;
        $this->prenom = $students->prenom;
        $this->matricule = $students->matricule;
        $this->dateNaissance = $students->dateNaissance;
        $this->contact_parent = $students->contact_parent;


    }
    protected $rules = [
        'nom' => 'required|string|min:2',
        'prenom' => 'required|string|min:3',
        'matricule' => 'required|string',
        'dateNaissance' => 'required|date',
        'contact_parent' => 'required|string'
    ];

    protected $messages = [
        'nom.required' => 'le champ nom est requis',
        'nom.min' => 'le nom doit avoir minimum 2 caracteres',
        'prenom.required' => 'le champ nom est requis',
        'prenom.min' => 'le nom doit avoir minimum 2 caracteres',
        'matricule.required' => 'le champ matricule est requis',
        'dateNaissance.required' => 'la champ date de naissance est requis',
        'contact_parent.required' => 'le champ contact parent est requis'
    ];

    public function update(){
        $this->validate();
        $this->students->update([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'matricule' => $this->matricule,
            'dateNaissance' => $this->dateNaissance,
            'contact)parent' => $this->contact_parent
        ]);
        session()->flash('success', 'Donnee eleve mis a jour avec success !!!');
        $this->redirectRoute('students',navigate:true);
    }

    public function render()
    {
        return view('livewire.edit-student');
    }
}
