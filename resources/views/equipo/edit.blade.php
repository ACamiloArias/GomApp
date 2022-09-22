@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('equipo/'.$equipo->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
  

    @include('equipo.form',['modo'=>'Editar'])

   </form>

   </div>
@endsection