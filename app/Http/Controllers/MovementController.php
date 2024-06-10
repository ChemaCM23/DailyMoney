<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MovementController extends Controller
{
    public function index()
    {
        // Obtener todas las categorías
        $categories = Category::all();

        // Pasar las categorías a la vista movement.blade.php utilizando compact
        return view('movement', compact('categories'));
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

        // Actualizar el saldo del usuario
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
