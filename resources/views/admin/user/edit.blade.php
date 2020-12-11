@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Editar Usuario</h2></div>

                <div class="card-body">
                    @include('custom.message')
                    <form action="{{ route('user.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="container">

                        <div  class="form-group"> 
                            <label for="exampleInputEmail1">Estado </label>                           
                            <input type="text" class="form-control" 
                            id="type" 
                            placeholder="type"
                            name="type"
                            value="{{ old('type', $user->type)}}"
                            >
                        </div>
                        <p>1: Usuario</p>
                        <p>2: Administrador</p>
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
