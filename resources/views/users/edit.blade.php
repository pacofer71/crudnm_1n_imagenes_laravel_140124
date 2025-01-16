@extends('layouts.principal')

@section('titulo')
    Editar usuario
@endsection

@section('cabecera')
    Editar Usuario
@endsection

@section('contenido')
    <div class="w-1/2 mx-auto p-4 bg-gray-100 rounded-xl shadow-xl border-2 border-blue-700">
        <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Datos Usuario</h2>

            <!-- Campo Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="name" name="name" value="{{ @old('name', $user->name) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <x-error for="name" />
            </div>

            <!-- Campo Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ @old('name', $user->email) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <x-error for="email" />
            </div>

            <!-- Select Departamento -->
            <div class="mb-4">
                <label for="departament_id" class="block text-sm font-medium text-gray-700">Departamento</label>
                <select id="departament_id" name="departament_id"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="x">Seleccione un departamento</option>
                    @foreach ($departamentos as $dep)
                        <option value="{{ $dep->id }}" selected="{{ @old('dep_id', $user->departament_id)==$dep->id }}">{{ $dep->nombre }}</option>
                    @endforeach
                </select>
                <x-error for="departament_id" />
            </div>

            <!-- Checkboxes Roles -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Roles de Usuario</label>
                <div class="space-y-2 mt-2">
                    @foreach($roles as $role)
                    <div>
                        <input type="checkbox" id="{{ $role->id }}" name="role_id[]" value="{{ $role->id }}" @checked(in_array( $role->id, old('role_id', $rolesUsuario)))
                            class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                        <label for="{{ $role->id }}" class="text-sm text-gray-700 font-bold">#{{ $role->nombre }}</label>
                    </div>
                    @endforeach
                    
                </div>
                <x-error for="role_id" />
            </div>
            <!-- Campo Imagen y Vista Previa -->
            <div class="flex items-center space-x-4 mb-4">
                <div class="flex-1">
                    <label for="imagen" class="block text-sm font-medium text-gray-700">Seleccionar Imagen</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*" oninput="preview.src=window.URL.createObjectURL(this.files[0])"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <div class="w-24 h-24 border rounded-lg overflow-hidden bg-gray-50">
                    <img id="preview" src="{{ Storage::url($user->imagen) }}" alt="Vista previa" class="w-full h-full object-cover">
                </div>
            </div>

           <!-- Botones -->
           <div class="flex justify-end space-x-4 mt-4">
            <button type="submit"
                class="ml-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <i class="fas fa-paper-plane mr-2"></i> Editar
            </button>

            <a href="{{ route('users.index') }}"
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                <i class="fas fa-times mr-2"></i> Cancelar
            </a>
        </div>
        </form>
    </div>
@endsection
