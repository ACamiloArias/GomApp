@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/tecnico/'.$tecnico->id) }}" method="post" enctype="multipart/form-data">

@csrf

{{ method_field('PATCH')}}

@include('tecnico.form', ['modo'=>'Editar'])


</form>
</div>
@endsection

