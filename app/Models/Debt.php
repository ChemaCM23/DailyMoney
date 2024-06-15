<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $fillable = [
        'user_id',
        'person_name',
        'amount_due',
        'amount_paid',
        'payment_date',
        'paid',
    ];
}
