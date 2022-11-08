@foreach ($listado as $propietario)
    <img src="{{$propietario->rutafoto}}" height="100px"><i>{{ $propietario->nombre }}</i><br/>
    
@endforeach