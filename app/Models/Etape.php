<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    use HasFactory;

    protected $table = "etape";

     protected $fillable = ["libelle", "action_id", "responsable_id"];

     public function user(){
         return $this->belongsTo('App\Models\User', "responsable_id", "id"); 
     }

     public function livrables(){
        return $this->hasMany('App\Models\Livrable'); 
    }
}
