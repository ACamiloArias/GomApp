@extends('layouts.app')
@section('content')
<div class="container">
<div class="alert-success" role="alert">
    
@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif 
</div>
<H1>ORDENES</H1>
<a href="{{url ('orden/create') }}" class="btn btn-success" ><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z"/>
</svg></a>
<br>
<br>
<table class="table table-light">
    <thead class=" thead-light">
        <tr>
            <th>No</th>
              <!-- <th>Equipo</th>-->
            <th>Tipo Orden</th>
            <th>Prioridad</th>
            <th>Estado</th>
            <th>Supervisor</th> 
            <th>F /Prog</th>
            <th>F /Inic</th>
            <th>F /Fin</th>
            <!-- <th>Tecnicos</th>-->
           <!-- <th>Repuestos</th>-->
           <!-- <th>Trabajo</th>-->
            <th> </th>
        </tr>
    </thead>
    <tbody>    
    @foreach( $ordens as $orden)
        <tr>
            <!-- Scripts -->
            <td>{{  $orden->id }}</td>
             <!-- <td>{{ $orden->equipo_NombreEquipo }}</td> -->
            <td>{{ $orden->TipoOrden }}</td>
            <td>{{ $orden->Prioridad}}</td>
            <td>{{ $orden->Estado }}</td>
            <td>{{ $orden->Supervisor }}</td>
            <td>{{ $orden->FechaProg }}</td>
            <td>{{ $orden->FechaInicio }}</td>
            <td>{{ $orden->FechaFin }}</td>
           <!-- <td>{{ $orden->tecnico_Nombre}}</td>-->
           <!-- <td>{{ $orden->repuesto_Nombre}}</td>-->
            <!--<td>{{ $orden->Trabajo}}</td>-->
            <td style="display: -webkit-inline-box;">
            <a style="margin: 2px;" href="{{ url('/orden/'.$orden->id.'/download' ) }}" class="btn btn-secondary"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
  <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
  <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
</svg>
            </a>
            <a style="margin: 2px;" href="{{ route('orden.show', $orden->id ) }}" class="btn btn-info"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-binoculars-fill" viewBox="0 0 16 16">
  <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z"/>
</svg>           
            </a>
            <a style="margin: 2px;" href="{{ route('orden.edit', $orden->id ) }}" class="btn btn-warning"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>             
            </a>                   
            <form action="{{ url('/orden/'.$orden->id ) }}"  class="d-inline" method = "post">
            
             </td>
        </tr>
        @endforeach
        </tbody>
</table>
{!! $ordens->links() !!}
</div>
@endsection