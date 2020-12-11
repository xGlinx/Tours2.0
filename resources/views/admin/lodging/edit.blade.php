@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Crear Ruta</h2></div>

                <div class="card-body">
                  @include('custom.message')

                    <form action="{{ route('lodging.update', $lodging->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="container">

                          <div class="form-group">
                            <label for="name">Nombre de la Ruta</label>                           
                            <input type="text" 
                            class="form-control" 
                            id="name" 
                            name="name"
                            value="{{ old('name', $lodging->name)}}"
                            >
                          </div>

                          <div class="form-group"> 
                            <label for="name">URL de Foto</label>                             
                            <input type="text" 
                            class="form-control" 
                            id="url-photo" 
                            name="url-photo"
                            value="{{ old('url-photo', $lodging['url-photo'])}}"
                            >
                          </div>

                          <div class="form-group">
                            <label for="name">Descripción</label>  
                            <textarea class="form-control" 
                            name="description" 
                            id="description" 
                            rows="3"> 
                            {{ old('description', $lodging->description)}}
                            </textarea>
                          </div>

                          <div class="form-group"> 
                            <label for="name">Posición</label>                             
                            <input type="text" 
                            class="form-control" 
                            id="position" 
                            name="position"
                            value="{{ old('position', $lodging->position)}}"
                            >
                          </div>

                          <div class="form-group"> 
                            <label for="name">Posición</label>                             
                            <input type="text" 
                            class="form-control" 
                            id="price" 
                            name="price"
                            value="{{ old('price', $lodging->price)}}"
                            >
                          </div>
                        
                          <div class="form-group">
                            <select class="form-control form-control-sm" id="tour_id" name="tour_id">
                                <option value="null">Seleccione un Tour</option>

                            @foreach($tours as $tour)
                                @if($tour->id == $lodging['tour_id'])    
                                    <option selected 
                                    value="{{$tour->id}}">
                                    {{$tour->name}}
                                    </option>
                                @else 
                                <option 
                                value="{{$tour->id}}">
                                {{$tour->name}}
                                </option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                          <hr>
                          <input class="btn btn-primary" type="submit" value="Guardar">
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
