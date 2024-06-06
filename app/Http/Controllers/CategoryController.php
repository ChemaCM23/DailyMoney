<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MovementController extends Controller
{
    public function create()
    {
        // Obtener todas las categorías con los movimientos asociados
        $categories = Category::with('movements')->get();

        // Pasar las categorías a la vista
        return view('movements.create', compact('categories'));
    }
}
