@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/orden')}}" method="post" enctype="multipart/form-data">
@csrf
@include('orden.form', ['modo'=>'Crear'] )

</form>


</div>
@endsection