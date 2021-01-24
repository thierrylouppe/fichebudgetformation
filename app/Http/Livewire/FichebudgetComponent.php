<?php

namespace App\Http\Livewire;

use App\Models\Action;
use App\Models\Direction;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class FichebudgetComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $showNewActionForm = false;
    public $actionEditForm = false;
    public $selectDirection = "";
    public $actionShow;
    public $actionDirectionEdit, $actionNomEdit, $actionImpactEdit, $actionObjectifEdit, $actionResponsableEdit;

    //personna
    protected $messages = [
        "actionDirectionEdit.required" => "La direction est obligatoire.",
        "actionNomEdit.required" => "Le nom est obligatoire.",
        "actionNomEdit.unique" => "Ce nom existe déjà.",
        "actionImpactEdit.required" => "L'impact est obligatoire.",
        "actionObjectifEdit.required" => "L'objectif est obligatoire.",
        "actionResponsableEdit.required" => "Le responsable est obligatoire.",
    ];

    public function updated($name, $value)
    {
        if($this->actionEditForm){
            $this->validateOnly($name, [
                'actionDirectionEdit' => 'required',
                'actionNomEdit' => 'required|unique:action,nom,'.$this->actionShow->id,
                'actionImpactEdit' => 'required',
                'actionObjectifEdit' => 'required',
                'actionResponsableEdit' => 'required'
            ]);
        }

        switch($name){
            case "selectDirection":
                $this->resetPage();
            break;
        }
        
    }

    public function render()
    {


        return view('livewire.fichebudget.index', [
            "directions" => Direction::all(),
            "users" => User::all(),
            "tableauActions"=> Action::where("direction_id",$this->selectDirection)->paginate(5)
        ])
            ->extends('layouts.master')
            ->section('content');
    }

    public function newAction()
    {
        $this->showNewActionForm = true;
    }

    public function updateActionEditParams(Action $action)
    {
    }

    public function resetEditFormData(){
        $this->resetValidation();
    }

    public function closeEditModal(){
        $this->actionEditForm = false;
        $this->resetEditFormData();
        $this->dispatchBrowserEvent('closeActionEdit');
    }

    public function updateAction() 
    {

        $this->validate([
            'actionDirectionEdit' => 'required',
            'actionNomEdit' => 'required|unique:action,nom,'.$this->actionShow->id,
            'actionImpactEdit' => 'required',
            'actionObjectifEdit' => 'required',
            'actionResponsableEdit' => 'required'
        ]);

        

        // Mise à jour de l'action dans la base de données
        Action::find($this->actionShow->id)->update([
            'direction_id' => $this->actionDirectionEdit,
            'nom' => $this->actionNomEdit,
            'objectif' => $this->actionObjectifEdit,
            'impact' => $this->actionImpactEdit,
            'responsable_id' => $this->actionResponsableEdit
        ]);

        


        $this->actionEditForm = false;
        $this->dispatchBrowserEvent('closeActionEdit');
        $this->dispatchBrowserEvent('ShowEditToast');

        
    }

    public function showActionDetails(Action $action)
    {
        //dump($action);
        $this->actionShow = $action;
        $this->actionEditForm = false;
        $this->dispatchBrowserEvent('showActionDetails');
    }

    public function showActionEdit()
    {
        $this->actionEditForm = true;
        $this->actionNomEdit = $this->actionShow->nom;
        $this->actionDirectionEdit = $this->actionShow->direction_id;
        $this->actionImpactEdit = $this->actionShow->impact;
        $this->actionObjectifEdit = $this->actionShow->objectif;
        $this->actionResponsableEdit = $this->actionShow->responsable_id;
        $this->dispatchBrowserEvent('showActionEdit');
    }

   

    
}
