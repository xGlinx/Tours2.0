@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Aprobar Reserva</h2></div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{ route('reserve.update', $reserve->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="container">

                        <div  class="form-group"> 
                            <label for="status">Estado </label>                           
                            <input type="text" class="form-control" 
                            id="status" 
                            name="status"
                            value="{{ old('status', $reserve->status)}}"
                            >
                        </div>
                        <p>0: Procesando</p>
                        <p>1: Aprobado</p>
                        <p>2: Desaprobado</p>
                        <hr>
                        <input class="btn btn-primary" type="submit" value="Guardar">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
