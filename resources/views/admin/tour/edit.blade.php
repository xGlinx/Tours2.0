@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Crear Tour</h2></div>

                <div class="card-body">
                   @include('custom.message')

                    <form action="{{ route('tour.update', $tour->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                    <div class="container">

                          <div class="form-group">  
                            <label for="name">Nombre del Tour</label>                            
                            <input type="text" 
                            class="form-control" 
                            id="name" 
                            name="name"
                            value="{{ old('name', $tour->name)}}"
                            >
                          </div>

                          <div class="form-group">
                            <label for="name">Descripcion</label>  
                            <textarea class="form-control" 
                            name="description" 
                            id="description" 
                            rows="3"> 
                             {{ old('description', $tour->description)}}
                            </textarea>
                          </div>

                          <div class="form-group">
                            <label for="name">URL de Portada</label>                              
                            <input type="text" 
                            class="form-control" 
                            id="url-front" 
                            name="url-front"
                            value="{{ old('url-front', $tour['url-front'])}}"
                            >
                          </div>

                          <div class="form-group">   
                            <label for="name">Titulo de Portada</label>                           
                            <input type="text" 
                            class="form-control" 
                            id="front-title" 
                            name="front-title"
                            value="{{ old('front-title', $tour['front-title'])}}"
                            >
                          </div>

                          <div class="form-group">        
                            <label for="name">URL de la foto Principal</label>                      
                            <input type="text" 
                            class="form-control" 
                            id="url-photo" 
                            name="url-photo"
                            value="{{ old('url-photo', $tour['url-photo'])}}"
                            >
                          </div>

                          <div class="form-group">
                            <label for="name">Duracion del Tour</label>  
                            <textarea class="form-control" 
                            name="duration" 
                            id="duration" 
                            rows="2"> 
                             {{ old('duration', $tour->duration)}}
                            </textarea>
                          </div>

                          <div class="form-group">    
                            <label for="name">Precio Total Aproximado</label>                          
                            <input type="text" 
                            class="form-control" 
                            id="price" 
                            name="price"
                            value="{{ old('price', $tour->price)}}"
                            >
                          </div>

                          <div class="form-group"> 
                            <label for="name">Precio del viaje</label>                             
                            <input type="text" 
                            class="form-control" 
                            id="price-travel" 
                            name="price-travel"
                            value="{{ old('price-travel', $tour['price-travel'])}}"
                            >
                          </div>

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
