@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('admin.aside')
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tours</div>
                <div class="card-body">

                <a href="{{route('tour.create')}}" 
                    class="btn btn-primary float-right">
                    Nuevo Tour
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
                        <th scope="col">Nombre</th>
                        <th scope="col">Duracion</th>
                        <th scope="col">Precio de Total</th>
                        <th colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($tours as $tour)
                        <tr>
                            <td>{{ $tour->name }}</td>
                            <td>{{ $tour->duration }}</td>
                            <td>{{ $tour['price-travel']}}</td>
                            <td> <a class="btn btn-success" href="{{route('tour.edit', $tour->id)}}">Editar</a> </td>
                            <td> 
                                <form action="{{ route('tour.destroy',$tour->id)}}" method="POST">
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
                {{ $tours->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
