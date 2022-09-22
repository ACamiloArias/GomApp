@extends('layouts.app')
@section('content')
<div class="container">
@if(Session::has('mensaje'))
<div class=" alert alert-success alert-dismissible " role="alert">
{{ Session::get('mensaje') }}
</div>
@endif  
    <br>
<H1>EQUIPOS</H1>
<a href="{{ url('equipo/create') }}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg></a>
<br>
<br>
<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>NOMBRE</th>
            <th>AREA</th>
            <th>TIPO EQUIPO</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach ( $equipos as $equipo) 
        <tr>
            <td>{{ $equipo->id }}</td>
            <td>{{ $equipo->NombreEquipo }}</td>
            <td>{{ $equipo->Area }}</td>
            <td>{{ $equipo->TipoEquipo }}</td>
            <td> 

                <a href="{{ url('equipo/'.$equipo->id.'/edit') }}" class="btn btn-warning" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a>


                <form action="{{ url('equipo/'.$equipo->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger"type="submit" onClick="return confirm('¿Estas seguro?')" value="Borrar">
                   </form>
                      
             </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
