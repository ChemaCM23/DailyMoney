<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movement;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los movimientos ordenados por categoría, importe, tipo y fecha
        $movements = Movement::orderBy('category_id')
            ->orderBy('amount')
            ->orderBy('type')
            ->orderBy('created_at')
            ->get();

        // Pasar los movimientos a la vista 'historial.index'
        return view('historial.index', compact('movements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
