<h1>{{ $modo }} Equipo </h1>
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
    @foreach($errors->all() as $error)
    <li> {{ $error }} </li>
    @endforeach
</ul>
</div>
@endif
<div clas="form-group">
<Label for="NombreEquipo"> Nombre Equipo  </Label>
<input type="text" class="form-control" name="NombreEquipo" 
value=" {{ isset($equipo->NombreEquipo)?$equipo->NombreEquipo:old('NombreEquipo') }} " id="NombreEquipo"> 
</div>  
<div clas="form-group">
<Label for="Area"> Area </Label>              
<input type="text" class="form-control" name="Area" 
 value=" {{ isset($equipo->Area)?$equipo->Area:old('Area') }} " id="Area">
</div>
<div clas="form-group">
<Label for="TipoEquipo"> Tipo Equipo </Label>              
<input type="text" class="form-control" name="TipoEquipo"  
value=" {{ isset($equipo->TipoEquipo)?$equipo->TipoEquipo:old('TipoEquipo') }} " id="TipoEquipo">
</div> 
<br>

<a href="{{url ('equipo/') }}"><svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
  <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
</svg></a>

<input class="btn btn-success" type="submit" Value="{{ $modo }}">
