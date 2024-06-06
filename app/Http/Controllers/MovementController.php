<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movement;

class MovementController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'type' => 'required|in:expense,income',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'amount' => 'required|numeric'
    ]);

    $movement = new Movement();
    $movement->user_id = $request->user_id;
    $movement->type = $request->type;
    $movement->category_id = $request->category_id;
    $movement->description = $request->description;
    $movement->amount = $request->amount;
    $movement->save();

    return back()->with('success', 'Movimiento guardado correctamente.');
}
}
