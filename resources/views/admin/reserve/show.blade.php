@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Reserva</h2></div>
                    <div class="card-body">
                        <div class="container">
                            <div  class="form-group"> 
                                Nombre: {{$reserve->user->name}}
                                <br>
                                DNI: {{ $reserve->user->dni}}
                                <br>
                                Correo: {{ $reserve->user->email}}
                                <hr>
                                Tour: {{$reserve->tour->name}}
                                <br>
                                Ruta: {{$reserve->route->name}}
                                <br>
                                Hospedaje: {{$reserve->lodging->name}}
                                <br>
                                Restaurante: {{$reserve->restaurant->name}}
                                <br>
                                Fecha: {{$reserve->date}}

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
