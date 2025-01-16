<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles', 'departament')->orderBy('name')->paginate(5);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departament::select('id', 'nombre')->orderBy('nombre')->get();
        $roles = Role::select('id', 'nombre')->orderBy('nombre')->get();
        return view('users.create', compact('departamentos', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'departament_id' => $request->departament_id,
            'imagen' => ($request->imagen) ? $request->imagen->store('images/perfil') : 'images/default.jpg',
        ]);
        $user->roles()->attach($request->role_id);

        return redirect()->route('users.index')->with('mensaje', 'Usuario Creado');
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
    public function edit(User $user)
    {
        $departamentos = Departament::select('id', 'nombre')->orderBy('nombre')->get();
        $roles = Role::select('id', 'nombre')->orderBy('nombre')->get();
        $rolesUsuario = $user->getRolesUserId();
        return view('users.edit', compact('departamentos', 'roles', 'user', 'rolesUsuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate($this->rules($user->id));
        $imagen = $user->imagen;
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'departament_id' => $request->departament_id,
            'imagen' => ($request->imagen) ? $request->imagen->store('images/perfil') : $user->imagen,
        ]);
        if ($request->imagen && basename($user->imagen) != 'default.jpg') {
            Storage::delete('$imagen');
        }
        return redirect()->route('users.index')->with('mensaje', 'Usuario Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (basename($user->imagen) != 'default.jpg') Storage::delete($user->imagen);
        $user->delete();
        return redirect()->route('users.index')->with('mensaje', 'Usuario Borrado');
    }

    private function rules(?int $id = null): array
    {
        return [
            'name' => ['required', 'string', 'min:4', 'max:32', 'unique:users,name,' . $id],
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'departament_id' => ['required', 'exists:departaments,id'],
            'role_id' => ['required', 'array', 'exists:roles,id'],
            'image' => ['image', 'max:2048'],
        ];
    }
}
