<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie_Operation extends Model
{
    use HasFactory;

    protected $table = 'categorie_operation';

    protected $fillable = [
        'id',
        'nom',
    ];
}
