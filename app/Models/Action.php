<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

     protected $table = "action";

     protected $fillable = ["nom", "objectifs", "budget", "date_debut", "date_fin", "impact", "direction_id"];

     public function direction(){
         return $this->belongsTo('App\Models\Direction');
     }

     public function etapes(){
        return $this->hasMany('App\Models\Etape');
    }
}
