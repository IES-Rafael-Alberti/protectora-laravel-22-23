<form action="{{isset($mascota)?route('mascotas.update', ['mascota'=>$mascota->id]):route('mascotas.store')}}" method="POST" enctype="multipart/form-data">
    @isset($mascota)
        @method('PUT')
    @endisset
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{isset($mascota)? $mascota->nombre:''}}">
    <label for="fecha_nacimiento">Fecha nacimiento:</label>
    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{isset($mascota)? date('yy-m-d', strtotime($mascota->fecha_nacimiento)):''}}">
    <input type="submit" value="{{isset($mascota)? 'Actualiza Mascota':'Crea Mascota'}}">
    @csrf
</form>