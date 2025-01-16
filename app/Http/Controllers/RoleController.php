<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::orderBy('nombre')->get();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());
        Role::create($request->all());
        return redirect()->route('roles.index')->with('mensaje', 'rol creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate($this->rules($role->id));
        $role->update($request->all());
        return redirect()->route('roles.index')->with('mensaje', 'role editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('mensaje', 'role borrado');

    }
    private function rules(?int $id = null): array
    {
        return [
            'nombre' => ['required', 'string', 'min:3', 'max:50', 'unique:roles,nombre,' . $id],
            'color' => ['required', 'color-hex'],
        ];
    }
}
