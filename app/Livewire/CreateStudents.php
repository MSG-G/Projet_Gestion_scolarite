<?php

namespace App\Livewire;

use App\Models\Students;
use Exception;
use Livewire\Component;

class CreateStudents extends Component
{
    public string $nom = '';
    public string $prenom = '';
    public string $matricule = '';
    public ?string $dateNaissance = null;
    public string $contact_parent = '';

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

    public function store(){
        try{
            $validate = $this->validate();

        Students::create([
            'nom' => $validate['nom'],
            'prenom' => $validate['prenom'],
            'matricule' => $validate['matricule'],
            'dateNaissance' => $validate['dateNaissance'],
            'contact_parent' => $validate['contact_parent']
        ]);
        session()->flash('success', 'Eleve enregistree avec success !');
        return $this->redirectRoute('students',navigate:true);
        }catch(Exception $e){
            dd($e);
        }
    }

    public function render()
    {
        return view('livewire.create-students');
    }
}
