@extends('layouts.app')
@section('content')
<div class="background-image">
</div>
<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="{{url('producto/create')}}" class="btn btn-success">Registrar Producto</a>
    <br>
    <br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Fecha_V</th>
                <th>Proveedor_id</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>
                    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->Foto}}" width="60"
                        alt="">
                </td>
                <td>{{$producto->Nombre}}</td>
                <td>{{$producto->Descripcion}}</td>
                <td>{{$producto->Stock}}</td>
                <td>{{$producto->Precio}}</td>
                <td>{{$producto->Fecha_V}}</td>
                <td>{{$producto->Proveedor_id}}</td>
                <td>
                    <a href="{{url('/producto/'.$producto->id.'/edit')}}" class="btn btn-warning">
                        Editar
                    </a>
                    <form action="{{url('/producto/'.$producto->id)}}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('Quieres eliminar')" class="btn btn-danger"
                            value="Eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $productos->links() !!}
</div>
@endsection