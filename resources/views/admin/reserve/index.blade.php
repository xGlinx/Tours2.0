@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('admin.aside')
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Reservas</div>
                <div class="card-body">

                    @include('custom.message')
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Tour</th>
                        <th scope="col">Fecha de partida</th>
                        <th colspan="2">Opciones</th>
                        <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($reserves as $reserve)
                        <tr>
                            <td>{{ $reserve->user->name }}</td>
                            <td>{{ $reserve->tour->name }}</td>
                            <td>{{ $reserve->date }}</td>
                            <td> <a class="btn btn-info" href="{{route('reserve.show', $reserve->id)}}">Ver detalles </a> </td>
                            <td> <a class="btn btn-success" href="{{route('reserve.edit', $reserve->id)}}">Editar </a> </td>
                            <td>
                            <input type="text"
                            @if( $reserve->state == '0')    
                                value="Procesando"
                                class="btn btn-warning"
                            @elseif ($reserve->state == '1')
                                value="Aprobado"
                                class="btn btn-success" 
                            @elseif ($reserve->state == '2')
                                value="Desaprobado"
                                class="btn btn-danger"
                            @elseif ($reserve->state == '3')
                                value="Cancelado"
                                class="btn btn-dark"
                            @endif
                            style="width:115px; height:15px"
                            readonly
                            >
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
