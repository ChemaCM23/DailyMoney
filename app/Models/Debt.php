<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $fillable = [
        'user_id', // Agrega user_id aquí
        'person_name',
        'amount_due',
    ];
}
