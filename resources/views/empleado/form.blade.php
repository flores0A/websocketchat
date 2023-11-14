
<h1>{{$modo}} Empleado</h1>
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        <!-- Mostrar mensajes de error si la validación falla -->
        @foreach( $errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif
<br>
<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="Nombre"
        value="{{ isset($empleado->nombre) ? $empleado->nombre : old('Nombre') }}" id="Nombre">

</div>
<div class="form-group">
    <label for="Apellido">Apellido</label>
    <input type="text" class="form-control" name="Apellido"
        value="{{ isset($empleado->apellido) ? $empleado->apellido :old('Apellido') }}" id="Apellido">
    <br>
</div>
<div class="form-group">
    <label for="Correo">Correo</label>
    <input type="email" class="form-control" name="Correo"
        value="{{ isset($empleado->correo) ? $empleado->correo :old('Correo') }}" id="Correo">
    <br>
</div>
<div class="form-group">
    <label for="Telefono">Teléfono</label>
    <input type="number" class="form-control" name="Telefono"
        value="{{ isset($empleado->telefono) ? $empleado->telefono :old('Telefono')}}" id="Telefono">
    <br>
</div>
<div class="form-group">
    <label for="Foto"></label>
    @if(isset($empleado->foto))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto }}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="Foto" value="" id="Foto">
    <br>
</div>
<input class="btn btn-success" type="submit" value="{{$modo}} Datos">
<a class="btn btn-primary" href="{{url('empleado')}}">Regresar</a>
<br>
