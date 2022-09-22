@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/repuesto/'.$repuesto->id) }}" method="post" enctype="multipart/form-data">

@csrf

{{ method_field('PATCH')}}

@include('repuesto.form', ['modo'=>'Editar'])


</form>
</div>
 @endsection