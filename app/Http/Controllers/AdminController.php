<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.index', ['users' => $users]);
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
    public function edit(User $admin)
    {
        return view('admin.edit', ['user' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'surname' => 'required|string|max:255',
            'phone' => 'required|string|min:9|max:9',
        ]);

        try {
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->surname = $request->surname;
            $admin->phone = $request->phone;
            $admin->save();;

            return redirect()->route('admin.index')->with('status', 'Usuario editado correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('admin.index')->with('status', 'Error en la base de datos.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        try {
            $admin->delete();
            return redirect()->route('admin.index')->with('status', 'Usuario borrado correctamente.');
        } catch (QueryException $ex) {
            return redirect()->route('admin.index')->with('status', 'Error en la base de datos.');
        }
    }

    /**
     * Make the specified user an admin.
     */
    public function makeAdmin($id)
    {
        //encontramos al user por su id
        $user = User::findOrFail($id);
        $user->is_admin = true;
        $user->save();

        Session::flash('success', '¡Usuario convertido en administrador exitosamente!');

        return redirect()->route('admin.index');
    }
}
