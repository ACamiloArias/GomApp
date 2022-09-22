<h1>{{ $modo }} Orden</h1>
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
<Label for="equipo_id"> Equipo </Label>
@if($modo != 'Mostrar')
	<select id="equipo_id" name="equipo_id" class="form-select">
@else
	<select id="equipo_id" name="equipo_id" disabled="true" class="form-select">
@endif
	<option value="">--- seleccione un Equipo ---</option>
	@foreach ($equipos as $equipo)
		@if(isset($orden->equipo_id))
			@if($orden->equipo_id == $equipo['id'])
				<option value="{{$equipo['id']}}" selected="true">{{$equipo['NombreEquipo']}}</option>
			@else
				<option value="{{$equipo['id']}}">{{$equipo['NombreEquipo']}}</option>
			@endif
		@else
				<option value="{{$equipo['id']}}">{{$equipo['NombreEquipo']}}</option>
		@endif
	@endforeach
</select>
<!--<input type="select" class="form-control" name="NombreEquipo" value=" {{ isset($equipos->NombreEquipo)?$Equipos->NombreEquipo:''}} " id="NombreEquipo">-->
</div> 
<div clas="form-group">
<Label for="TipoOrden">Tipo Orden </Label>
@if($modo != 'Mostrar')
	<input required type="text" class="form-control" name="TipoOrden" 
	value=" {{ isset($orden->TipoOrden)?$orden->TipoOrden:''}} " id="TipoOrden">
@else
	<input type="text" class="form-control" disabled="true" name="TipoOrden" 
	value=" {{ isset($orden->TipoOrden)?$orden->TipoOrden:''}} " id="TipoOrden">
@endif
</div> 
<div clas="form-group">
<Label for="Prioridad"> Prioridad  </Label>
@if($modo == 'Crear')
<!--<input required type="text" class="form-control" name="Prioridad" value=" {{ isset($orden->Prioridad)?$orden->Prioridad:''}} " id="Prioridad" >-->
<select name="Prioridad" id="Prioridad" class="form-select">
	<option value="-1" selected="true">Seleccione una prioridad</option>
	<option value="BAJA" >Baja</option>
	<option value="MEDIA" >Media</option>
	<option value="ALTA" >Alta</option>
</select>
@elseif($modo == 'Editar')
	<select name="Prioridad" id="Prioridad" class="form-select">
	@foreach(($prioridades = ["Seleccion" => "-1", "baja" => "BAJA", "media" => "MEDIA", "alta" => "ALTA"]) as $prioridad => $id)
		@if($orden->Prioridad == $prioridades[$prioridad])
			<option value="{{$id}}" selected="selected">{{$prioridad}}</option>
		@else
			<option value="{{$id}}" >{{$prioridad}}</option>
		@endif
	@endforeach
	</select>

	@elseif($modo == 'Mostrar')
	<select name="Prioridad" id="Prioridad" disabled class="form-select">
	@foreach(($prioridades = ["Seleccion" => "-1", "baja" => "BAJA", "media" => "MEDIA", "alta" => "ALTA"]) as $prioridad => $id)
		@if($orden->Prioridad == $prioridades[$prioridad])
			<option value="{{$id}}" selected="selected">{{$prioridad}}</option>
		@else
			<option value="{{$id}}" >{{$prioridad}}</option>
		@endif
	@endforeach
	</select>
	<!--input type="text" class="form-control" disabled="true" name="Prioridad" value=" {{ isset($orden->Prioridad)?$orden->Prioridad:''}} " id="Prioridad" >-->
@endif
</div> 
<div clas="form-group">
<Label for="Estado"> Estado  </Label>
@if($modo == 'Crear')
	<!--input required type="text" class="form-control" name="Estado" value=" {{ isset($orden->Estado)?$orden->Estado:''}} " id="Estado" >-->
	<select name="Estado" id="Estado" class="form-select">
	<option value="-1" selected="true">Seleccione un estado</option>
	<option value="ENAE" > ENAE -Enviada a Ejecución-</option> <!--Enviada a Ejecución >-->
	<option value="ENEJ" > ENEJ -En Ejecución- </option> <!--En Ejecución >-->
	<option value="ENEJ" > CANC -Cancelada- </option> <!--Cancelada >-->
	<option value="EJEC" > EJEC -Ejecutada- </option> <!--Ejecutada >-->
</select>
@elseif($modo == 'Editar')
	<select name="Estado" id="Estado" class="form-select">
	@foreach(($estados = ["Seleccion" => "-1", "ENAE" => "ENAE", "ENEJ" => "ENEJ", "ENEJ" => "ENEJ", "EJEC" => "EJEC" ]) as $estado => $id)
		@if($orden->estado == $estados[$estado])
			<option value="{{$id}}" selected="selected">{{$estado}}</option>
		@else
			<option value="{{$id}}" >{{$estado}}</option>
		@endif
	@endforeach
	</select>
	@elseif($modo == 'Mostrar')
	<select disabled name="Estado" id="Estado" class="form-select">
	@foreach(($estados = ["Seleccion" => "-1", "ENAE" => "ENAE", "ENEJ" => "ENEJ", "CANC" => "CANC", "EJEC" => "EJEC" ]) as $estado => $id)
		@if($orden->Estado == $estados[$estado])
			<option value="{{$id}}" selected="selected">{{$estado}}</option>
		@else
			<option value="{{$id}}" >{{$estado}}</option>
		@endif
	@endforeach
	</select>
	<!--input type="text" class="form-control" disabled="true" name="Estado" value=" {{ isset($orden->Estado)?$orden->Estado:''}} " id="Estado" >-->
@endif
</div> 
<div clas="form-group">
<Label for="Supervisor"> Supervisor  </Label>
@if($modo != 'Mostrar')
	<input required type="text" class="form-control" name="Supervisor" value=" {{ isset($orden->Supervisor)?$orden->Supervisor:''}} " id="Supervisor" >
@else
	<input type="text" class="form-control" disabled="true" name="Supervisor" value=" {{ isset($orden->Supervisor)?$orden->Supervisor:''}} " id="Supervisor" >
@endif		
</div> 
<div clas="form-group">
<Label for="FechaProg"> Fecha Programada   </Label>
@if($modo != 'Mostrar')
	<input required type="date" class="form-control" name="FechaProg" value=" {{ isset($orden->FechaProg)?$orden->FechaProg :''}} " id="FechaProg " >
@else
	<input type="text" class="form-control" disabled="true" name="FechaProg" value=" {{ isset($orden->FechaProg)?$orden->FechaProg :''}} " id="FechaProg " >
@endif
</div> 
<div clas="form-group">
<Label for="FechaInicio"> Fecha Inicio  </Label>
@if($modo != 'Mostrar')
	<input required type="date" class="form-control" name="FechaInicio" value=" {{ isset($orden->FechaInicio)?$orden->FechaInicio:''}} " id="FechaInicio" >
@else
	<input type="text" class="form-control" disabled="true" name="FechaInicio" value=" {{ isset($orden->FechaInicio)?$orden->FechaInicio:''}} " id="FechaInicio" >
@endif
</div> 
<div clas="form-group">
<Label for="FechaFin"> Fecha Fin  </Label>
@if($modo != 'Mostrar')
	<input required type="date" class="form-control" name="FechaFin" value=" {{ isset($orden->FechaFin)?$orden->FechaFin:''}} " id="FechaFin" >
@else
	<input type="text" class="form-control" disabled="true" name="FechaFin" value=" {{ isset($orden->FechaFin)?$orden->FechaFin:''}} " id="FechaFin" >
@endif

<div clas="form-group">
<Label for="tecnico_id"> Tecnicos </Label>
@if($modo != 'Mostrar')
	<select id="tecnico_id" name="tecnico_id" multiple class="form-select" value=" {{ isset($orden->tecnico_Nombre)?$orden->tecnico_Nombre:''}} ">
@else
	<select id="tecnico_id" name="tecnico_id" disabled="true" class="form-select" value=" {{ isset($orden->tecnico_Nombre)?$orden->tecnico_Nombre:''}} ">
@endif
	<option value="">--- seleccione un Tecnico ---</option>
	@foreach ($tecnicos as $tecnico)
		@if(isset($orden->tecnico_id))
			@if($orden->tecnico_id == $tecnico['id'])
				<option value="{{$tecnico['id']}}" selected="true">{{$tecnico['Nombre']." ".$tecnico['Apellido']}}</option>
			@else
				<option value="{{$tecnico['id']}}">{{$tecnico['Nombre']." ".$tecnico['Apellido']}}</option>
			@endif
		@else
				<option value="{{$tecnico['id']}}">{{$tecnico['Nombre']." ".$tecnico['Apellido']}}</option>
		@endif
	@endforeach
</select>
<!--<input type="select" class="form-control" name="Nombre" value=" {{ isset($tecnicos->Nombre)?$tecnicos->Nombre:''}} " id="Nombre">-->
</div> 
<!--<div clas="form-group">
<Label for="tecnico_id"></Label>
<input type="select" class="form-control" name="Nombre" value=" {{ isset($tecnicos->Nombre)?$tecnicos->Nombre:''}} " id="Nombre">
</div>--> 
<div clas="form-group">
<Label for="repuesto_id"> Repuesto </Label>
@if($modo != 'Mostrar')
	<select id="repuesto_id" name="repuesto_id" multiple class="form-select value=" {{ isset($orden->repuesto_Nombre)?$orden->repuesto_Nombre:''}} ">
@else
	<select id="repuesto_id" name="repuesto_id"   disabled="true" class="form-select" value=" {{ isset($orden->repuesto_Nombre)?$orden->repuesto_Nombre:''}} ">
@endif
	<option value="">--- seleccione un Repuesto ---</option>
	@foreach ($repuestos as $repuesto)
		@if(isset($orden->repuesto_id))
			@if($orden->repuesto_id == $repuesto['id'])
				<option value="{{$repuesto['id']}}" selected="true">{{$repuesto['Nombre']}}</option>
			@else
				<option value="{{$repuesto['id']}}">{{$repuesto['Nombre']}}</option>
			@endif
		@else
				<option value="{{$repuesto['id']}}">{{$repuesto['Nombre']}}</option>
		@endif				
	@endforeach
</select>
</div> 
<div clas="form-group">
<Label for="Trabajo"> Trabajo  </Label>
@if($modo != 'Mostrar')
	<input required type="text" class="form-control" name="Trabajo" value=" {{ isset($orden->Trabajo)?$orden->Trabajo:''}} " id="Trabajo" >
@else
	<input type="text" class="form-control" disabled="true" name="Trabajo" value=" {{ isset($orden->Trabajo)?$orden->Trabajo:''}} " id="Trabajo" >
@endif
<br>
@if($modo != 'Mostrar')
<input class="btn btn-success" type="submit" Value="{{ $modo }}">
<a class="btn btn-primary" href="{{url ('orden/') }}">Regresar</a>
@endif
<script>
	function valor () {}
</script>