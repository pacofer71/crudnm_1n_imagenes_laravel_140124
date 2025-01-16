@extends('layouts.principal')

@section('titulo')
    Roles
@endsection

@section('cabecera')
    Listado de Roles
@endsection

@section('contenido')
    <div class="flex flex-row-reverse mb-2">
        <a href="{{ route('roles.create') }}" class="p-2 rounded-xl text-white font-bold bg-blue-500 hover:bg-blue-700">
            <i class="fas fa-add mr-2"></i>NUEVO
        </a>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        NOMBRE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        COLOR
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ACCIONES
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->nombre }}
                        </th>
                        <td class="px-6 py-4">
                            <div class="px-4 py-2 rounded-xl text-white font-bold text-center"
                                style="background-color:{{ $item->color }};">{{ $item->color }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('roles.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('roles.edit', $item) }}" class="mr-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="submit">
                                    <i class="fas fa-trash text-red-600"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('alertas')
<x-alerta />
@endsection