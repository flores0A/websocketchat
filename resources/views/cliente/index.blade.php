@extends('layouts.app')
@section('content')
<div class="background-image">
</div>
< <div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="{{url('cliente/create')}}" class="btn btn-success">Registrar cliente</a>
    <br><br>
    <table class="table table-light ">

        <thead class="thead-light ">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Sexo</th>
                <th>Accines</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->apellido}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->direccion}}</td>
                <td>{{$cliente->sexo}}</td>
                <td>
                    <a href="{{url('/cliente/'.$cliente->id.'/edit')}}" class="btn btn-warning">
                        Editar
                    </a>
                    <form action="{{url('/cliente/'.$cliente->id)}}" class="d-inline" method="post">
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
    {!! $clientes->links() !!}
    </div>
    @endsection