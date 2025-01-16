@extends('layouts.principal')

@section('titulo')
    HOME
@endsection

@section('cabecera')
    Gestión de Sitio
@endsection

@section('contenido')
<div class="flex justify-center items-center h-[75vh]">
    <div class="relative w-full h-full max-w-full">
        <img 
            src="{{ Storage::url('images/empresa.jpg') }}" 
            alt="Descripción de la imagen" 
            class="absolute inset-0 w-full h-full object-cover rounded-lg aspect-video" 
            
        />
    </div>
</div>
@endsection
