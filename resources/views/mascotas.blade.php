@foreach ($listado as $mascota)
    <i>{{ $mascota->nombre }}</i><br/>
    @foreach ($mascota->fotos as $foto)
        <img src="{{$foto->rutafoto}}" height="100px">
    @endforeach
    <br/>
@endforeach