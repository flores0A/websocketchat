@extends('layouts.app')
@section('content')
<div class="container">
<br>
<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('empleado.form',['modo'=>'Registrar']);  
</form>
<br>
</div>
@endsection