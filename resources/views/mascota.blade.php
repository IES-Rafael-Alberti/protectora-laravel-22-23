<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $mascota->nombre }}
        </h2>
    </x-slot>
    
    <i>Fecha de nacimiento: {{ $mascota->fecha_nacimiento }}</i><br/>
    <form action="{{route('crear.foto', ['mascota' => $mascota->id])}}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="file" name="foto" id="foto">
        <input type="submit" value="Subir foto">
    </form>
    <table>
    @forelse ($mascota->fotos as $foto)
        <tr>
            <td><img src="{{$foto->rutafoto}}"></td>
            <td><a href="{{route('borrar.foto', ['fotomascota' => $foto->id])}}"><i class="fa-solid fa-trash-can"></i></a></td>
        </tr>
    @empty
        <tr>
            <td>
                {{-- Genera una imagen cuando la mascota no tiene fotos --}}
                <img src="{{fake()->imageUrl(100, 100, 'no', false, 'photos', true, 'png')}}">    
            </td>
        </tr>
    @endforelse
    </table>
</x-app-layout>