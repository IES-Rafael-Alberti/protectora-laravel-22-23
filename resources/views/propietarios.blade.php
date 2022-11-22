<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Propietarios') }}
        </h2>
    </x-slot>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Nombre</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($propietarios as $propietario)
                <tr>
                    <td><img src="{{$propietario->rutafoto}}"></td>
                    <td>
                        <a href="{{route('propietarios.show', ['propietario'=>$propietario->id])}}">
                            {{ $propietario->nombre . " " . $propietario->apellidos }}
                        </a>
                    </td>
                    <td>
                        {{-- Enlaza con editar mascota --}}
                        <a href="{{route('propietarios.edit', ['propietario'=>$propietario->id])}}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        {{-- Enlaza con borrar mascota --}}
                        {{-- Formulario necesario para petición con método DELETE --}}
                        <form action="{{route('propietarios.destroy', ['propietario'=>$propietario->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="#" onclick="this.closest('form').submit(); return false;">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
