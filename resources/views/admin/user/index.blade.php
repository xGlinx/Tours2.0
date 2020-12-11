@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('admin.aside')
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Usuarios</div>
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
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Correo Electrónico</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Tipo</th>
                        <th colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user['last-name']}}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->direction }}</td>
                            <td>{{ $user->type }}</td>
                            <td> <a class="btn btn-success" href="{{route('user.edit', $user->id)}}">Editar</a> </td>
                            <td> 
                                <form action="{{ route('user.destroy',$user->id)}}" method="POST">
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

                {{ $users->links() }}

            </div>
        </div>
    </div>
</div>
@endsection
