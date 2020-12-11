@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Crear Tour</h2></div>

                <div class="card-body">
                  @include('custom.message')

                    <form action="{{ route('tour.store')}}" method="POST">
                    @csrf

                    <div class="container">

                          <div class="form-group">
                            <label for="name">Nombre del Tour </label>                           
                            <input type="text" 
                            class="form-control" 
                            id="name" 
                            name="name"
                            value="{{ old('name')}}"
                            >
                          </div>

                          <div class="form-group">
                            <label for="name">Descripción</label>  
                            <textarea class="form-control" 
                            name="description" 
                            id="description" 
                            rows="3"> 
                            {{ old('description')}}
                            </textarea>
                          </div>

                          <div class="form-group"> 
                            <label for="name">URL de Portada</label>                             
                            <input type="text" 
                            class="form-control" 
                            id="url-front" 
                            name="url-front"
                            value="{{ old('url-front')}}"
                            >
                          </div>

                          <div class="form-group">
                            <label for="name">Titulo de Portada</label>                              
                            <input type="text" 
                            class="form-control" 
                            id="front-title" 
                            name="front-title"
                            value="{{ old('front-title')}}"
                            >
                          </div>

                          <div class="form-group">
                            <label for="name">URL de Foto Principal</label>                              
                            <input type="text" 
                            class="form-control" 
                            id="url-photo" 
                            name="url-photo"
                            value="{{ old('url-photo')}}"
                            >
                          </div>

                          <div class="form-group">
                            <label for="name">Duración del Tour</label>  
                            <textarea class="form-control" 
                            name="duration" 
                            id="duration" 
                            rows="2"> 
                            {{ old('duration')}}
                            </textarea>
                          </div> 

                          <div class="form-group"> 
                            <label for="name">Precio Total Aproximado</label>                             
                            <input type="text" 
                            class="form-control" 
                            id="price" 
                            name="price"
                            value="{{ old('price')}}"
                            >
                          </div>

                          <div class="form-group"> 
                            <label for="name">Precio del Total </label>                            
                            <input type="text" 
                            class="form-control" 
                            id="price-travel" 
                            name="price-travel"
                            value="{{ old('price-travel')}}"
                            >
                          </div>

                          <hr>
                          <input class="btn btn-primary" type="submit" value="Crear">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
