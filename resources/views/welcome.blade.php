{{-- @extends('layouts.app')--}}

{{-- @section('title', 'Inicio')--}}

{{-- @section('meta-description', 'Inicio meta description')--}}

{{-- @section('content')--}}
{{-- <h1>Inicio</h1>--}}
{{-- @endsection--}}

{{-- @component('components.layout')--}}
{{-- <h1>Inicio</h1>--}}
{{-- @endcomponent--}}

<x-layouts.app title="inicio" meta-description="Inicio meta description">
   {{-- <x-slot name="title">--}}

   
   {{--    Inicio--}}
   {{--  </x-slot>--}}
   <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">
      @auth()
         <div >Usuario autenticado: {{ Auth::user('')->name }}</div>
      @endauth
  </h1>
</x-layouts.app>
