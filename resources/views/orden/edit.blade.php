@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/orden/'.$orden->id ) }}" method="POST" enctype="multipart/form-data"> 
@csrf
{{ method_field('PATCH') }}

@include('orden.form', ['modo'=>'Editar'] )

</form>

</div>
@endsection