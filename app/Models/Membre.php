<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $fillable = ['photo','vocal','textprofil','artisteprefere','loisir','enfant','nbrenfant','sortir','vivreseule','seriepreferer','dateDeNaissance','ville'];
}
