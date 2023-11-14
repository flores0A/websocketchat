<h1>{{$modo}} Cliente</h1>
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
        value="{{ isset($cliente->nombre) ? $cliente->nombre : old('Nombre') }}" id="Nombre">

</div>
<div class="form-group">
    <label for="Apellido">Apellido</label>
    <input type="text" class="form-control" name="Apellido"
        value="{{ isset($cliente->apellido) ? $cliente->apellido :old('Apellido') }}" id="Apellido">
    <br>
</div>
<div class="form-group">
    <label for="Telefono">Teléfono</label>
    <input type="number" class="form-control" name="Telefono"
        value="{{ isset($cliente->telefono) ? $cliente->telefono :old('Telefono')}}" id="Telefono">
    <br>
</div>
<div class="form-group">
    <label for="Direccion">Direccion</label>
    <input type="text" class="form-control" name="Direccion"
        value="{{ isset($cliente->direccion) ? $cliente->direccion :old('Direccion') }}" id="Direccion">
    <br>
</div>
<div class="form-group">
    <label for="Sexo">Sexo</label>
    <input type="text" class="form-control" name="Sexo"
        value="{{ isset($cliente->sexo) ? $cliente->sexo :old('Sexo') }}" id="Sexo">
    <br>
</div>
<input class="btn btn-success" type="submit" value="{{$modo}} Datos">
<a class="btn btn-primary" href="{{url('cliente')}}">Regresar</a>
<br>