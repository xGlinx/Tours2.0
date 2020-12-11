@extends('auth.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container recent">
            @forelse ($tours as $tour)
            <div class="">
            <div class="card">
                <div class="card-header">
                    {{$tour->name}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <iframe src="{{$tour['url-photo']}}" position="center" width="348" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        </div>
                        <div class="col-md-8">
                            <p class="card-text">{{$tour->description}}</p>
                            <p class="card-text">Duración: {{$tour->duration}}</p>
                            <p class="card-text">Precio Estimado: S/. {{$tour['price']}}</p>
                            <a class="btn btn-primary" href="{{route ('tours.show', $tour->id) }}" >Ver detalles</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p>No hay ningun Tour</p>
            </div>

            @endforelse
        </div>
    </div>  
</div>
@endsection 