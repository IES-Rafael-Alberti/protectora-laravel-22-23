<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $mascota->nombre }}
        </h2>
    </x-slot>
    
    <i>Fecha de nacimiento: {{ $mascota->fecha_nacimiento }}</i><br/>
    @forelse ($mascota->fotos as $foto)
        <img src="{{$foto->rutafoto}}" height="100px">
    @empty
        {{-- Genera una imagen cuando la mascota no tiene fotos --}}
        <img src="{{fake()->imageUrl(100, 100, 'no', false, 'photos', true, 'png')}}">    
    @endforelse
</x-app-layout>