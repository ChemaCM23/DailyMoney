<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class MovementController extends Controller
{
    public function index()
    {
        // Obtener todos los movimientos del usuario autenticado
        $movements = Auth::user()->movements()->latest()->get();

        // Obtener todas las categorías
        $categories = Category::all();

        // Obtener historial de movimientos (todos los movimientos del usuario)
        $history = Auth::user()->movements()->latest()->get();

        // Pasar los movimientos, historial y categorías a la vista movement.blade.php utilizando compact
        return view('movement', compact('movements', 'history', 'categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'type' => 'required|in:expense,income',
                'category_id' => 'required|exists:categories,id',
                'description' => 'nullable|string',
                'amount' => 'required|numeric'
            ]);

            $user_id = Auth::id(); // Obtener el ID del usuario autenticado

            // Guardar el movimiento
            $movement = new Movement();
            $movement->user_id = $user_id;
            $movement->type = $request->type;
            $movement->category_id = $request->category_id;
            $movement->description = $request->description;
            $movement->amount = $request->amount;
            $movement->save();

            // Actualizar el saldo del usuario (esto lo asumo, ajusta según tu lógica)
            $user = Auth::user();
            if ($request->type === 'income') {
                $user->balance += $request->amount;
            } elseif ($request->type === 'expense') {
                $user->balance -= $request->amount;
            }
            $user->save();

            return back()->with('success', 'Movimiento guardado correctamente.');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Imprime cualquier excepción que ocurra
        }
    }
}
