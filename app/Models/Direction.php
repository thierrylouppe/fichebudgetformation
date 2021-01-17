<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    protected $table = "direction";

    protected $fillable = ["libelle", "abbr"];

    public function actions(){
        return $this->hasMany('App\Models\Action');
    }
}
