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
    <a href="{{url('empleado/create')}}" class="btn btn-success">Registrar Empleado</a>
    <br>
    <br>
    <table class="table table-light ">

        <thead class="thead-light ">
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{$empleado->id}}</td>
                <td>
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage/' . $empleado->foto) }}" width="60"
                        alt="">
                </td>
                <td>{{$empleado->nombre}}</td>
                <td>{{$empleado->apellido}}</td>
                <td>{{$empleado->correo}}</td>
                <td>{{$empleado->telefono}}</td>
                <td>
                    <a href="{{url('/empleado/'.$empleado->id.'/edit')}}" class="btn btn-warning">
                        Editar
                    </a>
                    <form action="{{url('/empleado/'.$empleado->id)}}" class="d-inline" method="post">
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
    {!! $empleados->links() !!}
</div>
@endsection