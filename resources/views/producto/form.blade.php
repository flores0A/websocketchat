<h1>{{$modo}} Producto</h1>
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
        value="{{ isset($producto->Nombre) ? $producto->Nombre : old('Nombre') }}" id="Nombre">

</div>
<div class="form-group">
    <label for="Descripcion">Descripcion</label>
    <input type="text" class="form-control" name="Descripcion"
        value="{{ isset($producto->Descripcion) ? $producto->Descripcion :old('Descripcion') }}" id="Descripcion">
    <br>
</div>
<div class="form-group">
    <label for="Stock">Stock</label>
    <input type="number" class="form-control" name="Stock"
        value="{{ isset($producto->Stock) ? $producto->Stock :old('Stock') }}" id="Stock">
    <br>
</div>
<div class="form-group">
    <label for="Precio">Precio</label>
    <input type="number" class="form-control" name="Precio"
        value="{{ isset($producto->Precio) ? $producto->Precio :old('Precio')}}" id="Precio">
    <br>
</div>
<div class="form-group">
    <label for="Fecha_V">Fecha_V</label>
    <input type="date" class="form-control" name="Fecha_V"
        value="{{ isset($producto->Fecha_V) ? $producto->Fecha_V :old('Fecha_V')}}" id="Fecha_V">
    <br>
</div>
<div class="form-group">
    <label for="Proveedor_id">Proveedor_id</label>
    <input type="number" class="form-control" name="Proveedor_id"
        value="{{ isset($producto->Proveedor_id) ? $producto->Proveedor_id :old('Proveedor_id')}}" id="Proveedor_id">
    <br>
</div>
<div class="form-group">
    <label for="Foto"></label>
    @if(isset($producto->Foto))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->Foto }}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="Foto" value="" id="Foto">
    <br>
</div>
<input class="btn btn-success" type="submit" value="{{$modo}} Datos">
<a class="btn btn-primary" href="{{url('producto')}}">Regresar</a>
<br>
