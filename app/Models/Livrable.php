<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livrable extends Model
{
    use HasFactory;

    protected $table = "livrable";

    protected $fillable = ["libelle", "etape_id"];
}
