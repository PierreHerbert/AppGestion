<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $table = 'operation';

    protected $fillable = [
        'id',
        'categorie_operation_id',
        'nature',
        'montant',
        'date',
        'type_operation',
        'client_id'
    ];
}
