<form action="{{isset($propietario)?route('propietarios.update', ['propietario'=>$propietario->id]):route('propietarios.store')}}" method="POST" enctype="multipart/form-data">
    @isset($propietario)
        @method('PUT')
    @endisset
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{isset($propietario)? $propietario->nombre:''}}">
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" value="{{isset($propietario)? $propietario->apellidos:''}}">
    @isset($propietario)
        <img src="{{$propietario->rutafoto}}" height="50px">
    @endisset
    <label for="foto">Foto:</label>
    <input type="file" name="foto" id="foto">
    <input type="submit" value="{{isset($propietario)? 'Actualiza Propietario':'Crea Propietario'}}">
    @csrf
</form>