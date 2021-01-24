<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    use HasFactory;

    protected $table = "etape";

     protected $fillable = ["livrable_attendus", "action_id", "budget", "date_debut", "date_fin", "responsable_id"]; 

     

     public function actions(){
        return $this->hasMany('App\Models\Action'); 
    }
}
