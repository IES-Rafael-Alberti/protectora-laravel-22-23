<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $propietario->nombre . " " . $propietario->apellidos }}
        </h2>
    </x-slot>

    <img class="perfil" src="{{$propietario->rutafoto}}">
</x-app-layout>