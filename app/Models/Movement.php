<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    /**
     * Obtener el usuario relacionado con este movimiento.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtener la categoría asociada a este movimiento.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
