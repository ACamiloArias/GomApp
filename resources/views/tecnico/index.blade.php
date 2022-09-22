@extends('layouts.app')

@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class=" alert alert-success alert-dismissible " role="alert">
{{ Session::get('mensaje') }}

</div>
@endif  
 

    
<H1>TECNICOS</H1>
<br>
<a href="{{url('tecnico/create')}}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg></a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
    <tr>
            <th>#</th>
            <th>FOTO</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>TELEFONO</th>
            <th>CORREO</th>
            <th>ESPECIALIDAD</th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($tecnicos as $tecnico)
        <tr>
            <td>{{$tecnico->id }}</td>

            <td>
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$tecnico->Foto }}" width="100" alt="">
            </td>
            <td>{{$tecnico->Nombre}}</td>
            <td>{{$tecnico->Apellido}}</td>
            <td>{{$tecnico->Telefono}}</td>
            <td>{{$tecnico->Correo}}</td>
            <td>{{$tecnico->Especialidad}}</td>
            <td>
                <a href="{{ url('/tecnico/'.$tecnico->id.'/edit') }}"class="btn btn-warning">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a>

            <form action="{{ url('/tecnico/'. $tecnico->id)}}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input  class="btn btn-danger"  type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
            </form>
        </td>

        </tr>
        @endforeach
    </tbody>

 </table>
 {!! $tecnicos->links() !!}
 </div>
 @endsection