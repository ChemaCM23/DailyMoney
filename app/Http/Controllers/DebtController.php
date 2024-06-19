<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debt;

class DebtController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'newDebtorName' => 'required|string|max:255',
            'debtAmount' => 'required|numeric|min:0',
        ]);

        Debt::create([
            'user_id' => auth()->id(),
            'person_name' => $request->input('newDebtorName'),
            'amount_due' => $request->input('debtAmount'),
        ]);

        return redirect()->back()->with('success', 'Deuda agregada correctamente.');
    }


    public function index()
    {
        // registros usuario autenticado
        $deudores = Debt::where('user_id', auth()->id())->get();
        return view('utilities', compact('deudores'));
    }

    public function markAsPaid($id)
    {
        $deuda = Debt::findOrFail($id);
        $deuda->delete();

        return redirect()->route('utilities.index')->with('success', 'Deuda marcada como pagada.');
    }

}
