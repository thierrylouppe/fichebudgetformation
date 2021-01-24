<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

     protected $table = "action";

     protected $fillable = ["nom", "objectifs",  "impact", "direction_id", "responsable_id"];

     public function user(){
        return $this->belongsTo('App\Models\User', "responsable_id", "id"); 
    }

     public function direction(){
         return $this->belongsTo('App\Models\Direction'); 
     }

     
}
