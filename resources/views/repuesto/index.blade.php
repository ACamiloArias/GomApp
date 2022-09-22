@extends('layouts.app')

@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class=" alert alert-success alert-dismissible " role="alert">
{{ Session::get('mensaje') }}

</div>
@endif  
 

    

<H1>REPUESTOS</H1>
<br>

<a REPUESTOS href="{{url('repuesto/create')}}" class="btn btn-success" ><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-clipboard2-plus-fill" viewBox="0 0 16 16">
  <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
  <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM8.5 6.5V8H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V9H6a.5.5 0 0 1 0-1h1.5V6.5a.5.5 0 0 1 1 0Z"/>
</svg></a>
<br>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
    <tr>
            <th>CODIGO</th>
            <th>FOTO</th>
            <th>NOMBRE</th>
            <th>UM</th>
            <th>PRECIO</th>
            <th></th
            
        </tr>
    </thead>
    <tbody>
    @foreach($repuestos as $repuesto)
        <tr>
            <td>{{$repuesto->id }}</td>
            <td>
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$repuesto->Foto }}" width="100" alt="">
            </td>
            <td>{{$repuesto->Nombre }}</td>
            <td>{{$repuesto->UM }}</td>
            <td>{{$repuesto->Precio }}</td>
            
            <td>
              <br>

                <a href="{{ url('/repuesto/'.$repuesto->id.'/edit') }} " class="btn btn-warning">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a>

                
            <form action="{{ url('/repuesto/'. $repuesto->id)}}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            
            <input  class="btn btn-danger"  type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar" >
            
            </form>
        </td>

        </tr>
        @endforeach
    </tbody>

 </table>
 {!! $repuestos->links() !!}
 </div>
 @endsection