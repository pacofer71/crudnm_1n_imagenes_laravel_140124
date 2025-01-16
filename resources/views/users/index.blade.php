@extends('layouts.principal')

@section('titulo')
    Usuarios
@endsection

@section('cabecera')
    Listado Usuarios
@endsection

@section('contenido')
    <div class="flex flex-row-reverse mb-2">
        <a href="{{ route('users.create') }}" class="p-2 rounded-xl text-white font-bold bg-blue-500 hover:bg-blue-700">
            <i class="fas fa-add mr-2"></i>NUEVO
        </a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <th scope="col" class="px-6 py-3">
                    USER
                </th>
                <th scope="col" class="px-6 py-3">
                    DEPARTAMENT
                </th>
                <th scope="col" class="px-6 py-3">
                    ROLES
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="{{ Storage::url($item->imagen) }}" alt="Jese image">
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{ $item->name }}</div>
                                <div class="font-normal text-gray-500">{{ $item->email }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <p class="p-2 rounded-xl w-42 text-center font-bold text-white"
                                style="background-color:{{ $item->departament->color }}">
                                {{ $item->departament->nombre }}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                @foreach ($item->roles as $rol)
                                    <li class="italic py-1 px-2 rounded text-white w-32 texxt-center"
                                        style="background-color:{{ $rol->color }}">#{{ $rol->nombre }}</li>
                                @endforeach
                            </ul>

                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('users.destroy', $item) }}" method="POST" id="form-{{ $item->id }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('users.edit', $item) }}" class="mr-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type='button' onclick="confirmDelete({{ $item->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-2">
        {{ $users->links() }}
    </div>
@endsection
@section('alertas')
    <x-alerta />
@endsection
@section('confirm')
    <x-confirmar />
@endsection
