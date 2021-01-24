<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ActionComponent extends Component
{
    public $number = 0;


    public function render()
    {
        return view('livewire.action-component')
        ->extends('layouts.master')
        ->section('content');
    }

    public function ajouter(){
        $this->number++;
    }
}
