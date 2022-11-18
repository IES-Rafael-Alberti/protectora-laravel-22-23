<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mascotas') }}
        </h2>
    </x-slot>

    <table class="table-dark table-striped">
        <thead>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mascotas as $mascota)
                {{-- Enlaza con detalle mascota --}}
                <tr>
                    <td >
                        <a href="{{route('mascotas.show', ['mascota'=>$mascota->id])}}">
                            <i>{{ $mascota->nombre }}</i>
                        </a>
                    </td>
                    <td>
                        {{-- Enlaza con editar mascota --}}
                        <a href="{{route('mascotas.edit', ['mascota'=>$mascota->id])}}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        {{-- Enlaza con borrar mascota --}}
                        {{-- Formulario necesario para petición con método DELETE --}}
                        <form action="{{route('mascotas.destroy', ['mascota'=>$mascota->id])}}" method="POST">
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