<h1>{{ $modo }} Tecnico </h1>


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

<label for="Nombre" >Nombre</label>
<input type="text"  class="form-control" name="Nombre" value="{{ isset ($tecnico->Nombre)?$tecnico->Nombre:old('Nombre')}}" id="Nombre">

</div>  


<div clas="form-group">

<label for="Apellido">Apellido</label>
<input type="text" class="form-control" name="Apellido" value="{{ isset ($tecnico->Apellido)?$tecnico->Apellido:old('Apellido')}}" id="Apellido">
</div>  


<div clas="form-group">

<label for="Telefono">Telefono</label>
<input type="text"  class="form-control" name="Telefono" value="{{ isset ($tecnico->Telefono)?$tecnico->Telefono:old('Telefono')}}" id="Telefono">
</div>  


<div clas="form-group">
<label for="Correo">Correo</label>
<input type="email" class="form-control" name="Correo" value="{{ isset ($tecnico->Correo)?$tecnico->Correo:old('Correo')}}" id="Correo">
</div>  


<div clas="form-group">

<label for="Especialidad">Especialidad</label>
<input type="text" class="form-control" name="Especialidad" value="{{ isset ($tecnico->Especialidad)?$tecnico->Especialidad:old('Especialidad')}}" id="Especialidad"> 
</div>  


<div clas="form-group">

<label for="Foto"></label>
@if(isset($tecnico->Foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$tecnico->Foto }}" width="150" alt="">
@endif
<input type="file" class="form-control" name="Foto" value="" id="Foto" >

</div>  
<br>
<a href="{{url('tecnico/')}}"><svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
  <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
</svg></a>

<input  class="btn btn-success" type="submit" value="{{ $modo }} datos"></a>