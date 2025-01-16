@extends('layouts.principal')

@section('titulo')
Editar departamento
@endsection

@section('cabecera')
Editar Departamento
@endsection

@section('contenido')
<div class="p-2 rounded-xl w-1/2 mx-auto border-2 border-black shadow-xl">
    <form METHOD="post" action="{{ route('departaments.update', $departament) }}">
        @csrf
        @method('put')
        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre Departamento</label>
            <input type="text" id="nombre" name="nombre" value="{{ @old('nombre', $departament->nombre) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Nombre Departamento" />
            <x-error for="nombre" />
        </div>
        <div class="mb-5">
            <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color Departamento</label>
            <input type="color" id="color" name="color" value="{{ @old('color', $departament->color) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <x-error for="color" />
        </div>
        <div class="flex flex-row-reverse">
            <button type="submit" class="ml-2 p-2 rounded-xl font-bold text-white bg-purple-500 hover:bg-purple-700">
                <i class="fas fa-save mr-1"></i>Editar
            </button>
            <a href="{{ route('departaments.index') }}"
                class="p-2 rounded-xl font-bold text-white bg-red-500 hover:bg-red-700">
                <i class="fas fa-cancel">&nbsp;Cancelar</i>
            </a>
        </div>
    </form>
</div>
@endsection