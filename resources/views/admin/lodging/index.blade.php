@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('admin.aside')
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Hospedajes</div>
                <div class="card-body">

                <a href="{{route('lodging.create')}}" 
                    class="btn btn-primary float-right">
                    Nuevo Hospedaje
                </a>
                <br>
                <br>

                @include('custom.message')
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Posición</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Tour</th>
                        <th colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($lodgings as $lodging)
                        <tr>
                            <td>{{ $lodging->name }}</td>
                            <td>{{ $lodging->description }}</td>
                            <td>{{ $lodging->position }}</td>
                            <td>{{ $lodging->price }}</td>
                            <td>{{ $lodging['tour_id'] }}</td>
                            <td> <a class="btn btn-success" href="{{route('lodging.edit', $lodging->id)}}">Editar</a> </td>
                            <td> 
                                <form action="{{ route('lodging.destroy',$lodging->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <td> 
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
