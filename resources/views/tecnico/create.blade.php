@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/tecnico') }}" method="post" enctype="multipart/form-data">
@csrf
@include('tecnico.form', ['modo'=>'Crear'])
</form>
</div>
@endsection