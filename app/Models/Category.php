<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Obtener los movimientos asociados a esa categoria
     */
    public function movements()
    {
        return $this->belongsToMany(Movement::class);
    }
}
