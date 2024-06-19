<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;



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
                'amount' => 'required|numeric|min:0'
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

    // Editar un movimiento
    public function edit($id)
    {
        $movement = Movement::find($id);
        $categories = Category::all();
        return view('edit_movement', compact('movement', 'categories'));
    }

    public function update(Request $request, $id)
{
    try {
        $request->validate([
            'type' => 'required|in:expense,income',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0'
        ]);

        $movement = Movement::findOrFail($id);
        $user = Auth::user();

        // Ajustar el balance antes de actualizar el movimiento
        if ($movement->type === 'expense') {
            $user->balance += $movement->amount; // Revertir el gasto anterior
        } elseif ($movement->type === 'income') {
            $user->balance -= $movement->amount; // Revertir el ingreso anterior
        }

        // Actualizar el movimiento
        $movement->type = $request->type;
        $movement->category_id = $request->category_id;
        $movement->description = $request->description;
        $movement->amount = $request->amount;
        $movement->save();

        // Ajustar el balance con el nuevo valor del movimiento
        if ($request->type === 'expense') {
            $user->balance -= $request->amount;
        } elseif ($request->type === 'income') {
            $user->balance += $request->amount;
        }

        $user->save();

        return redirect()->route('movement.index')->with('success', 'Movimiento actualizado correctamente.');
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
}





public function destroy($id)
{
    try {
        $movement = Movement::findOrFail($id);
        $user = Auth::user();

        // Revertir el impacto del movimiento en el balance del usuario
        if ($movement->type === 'expense') {
            $user->balance += $movement->amount; // Revertir el gasto
        } elseif ($movement->type === 'income') {
            $user->balance -= $movement->amount; // Revertir el ingreso
        }

        $user->save();

        $movement->delete();

        return back()->with('success', 'Movimiento eliminado correctamente.');
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
}

public function generatePdf()
{
    $user = Auth::user();

    // Obtener todos los movimientos del usuario autenticado
    $movements = Movement::where('user_id', $user->id)->with('category')->get();

    $html = view('pdf', compact('movements'))->render();

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);

    $dompdf = new Dompdf($options);

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    return $dompdf->stream("Historial.pdf");
}

}
