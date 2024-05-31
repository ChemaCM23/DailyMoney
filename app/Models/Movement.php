<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    /**
     * Obtener los usuarios relacionados con esos movimientos
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtener las categorías asociadas a este movimiento.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
