@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('BIENVENIDO') }}</div>
                <video src="/imag/video.mp4" autoplay="true" loop="true" style="max-width:100%;height:auto;"></video>
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('¡Estás conectado con GOM
                        Sistema de Gestion de Ordenes de Mantenimiento para la empresa CAMSECURITY!') }}


                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
