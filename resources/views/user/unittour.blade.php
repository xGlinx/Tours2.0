@extends('layouts.app')

<div class="fh5co-home-banner">
    <div class="card">
        <img class="card-img" src="{{$tour['url-front']}}" alt="{{$tour->id}}">
        <div class="card-img-overlay">
            <div class="center-text">
                <h2 class="card-title">{{$tour['front-title']}}</h2>
            </div>
        </div>
    </div>
</div> 

<div class="blog-content-bckg">
    <div class="blog-content-inner">
        <div class="container recent">
            <div class="center-text">
                <h2 class="display-5 card-title" ><center>{{$tour->name}}</center></h2>
            </div>

            <div class="row ">
                <div class="col-xl-4 col-lg-12 single-blog__img container-iframe">
                    <iframe src="{{$tour['url-photo']}}" position="center" width="348" height="402" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
                <div class="col-xl-8 col-lg-12 single-blog__text">
                    <p class="card-text">{{$tour->description}}</p>
                    <p class="card-text">Duración: {{$tour->duration}}</p>
                    <p class="card-text">Precio de viaje: {{$tour['price-travel']}}</p>
                    <p class="card-text">Precio: {{$tour->price}}</p>
                </div>
            </div>
            
            <div>
                <h2 >Rutas</h2>
                    <div class="row justify-content-center">
                    @forelse ($rutas as $ruta)
                        <div class="col-md-5">
                            <div class="card mb-4">
                                <div class="card-img container-iframe">
                                    <iframe src="{{$ruta['url-photo']}}" position="center" width="348" height="402" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">{{$ruta->name}}</h4>
                                    <p class="card-text">{{$ruta->description}}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No se encuentra ningun Hospedaje</p> 
                    @endforelse
                    </div>
            </div>

            <div>
                <h2 >Los Mejores Hospedajes</h2>
                    <div class="row justify-content-center">
                    @forelse ($hospedajes as $hospedaje)
                        <div class="col-md-5">
                            <div class="card mb-4">
                                <div class="card-img container-iframe">
                                    <iframe src="{{$hospedaje['url-photo']}}" position="center" width="348" height="402" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">{{$hospedaje->name}}</h4>
                                    <p class="card-text">{{$hospedaje->description}}</p>
                                </div>
                                <div class=" card-footer text-center text-muted">
                                    Precio: {{$hospedaje->price}}
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No se encuentra ningun Hospedaje</p> 
                    @endforelse
                    </div>
            </div>

            <div>
                <h2 >Los Mejores Restaurantes</h2>
                    <div class="row justify-content-center">
                    @forelse ($restaurantes as $restaurante)
                        <div class="col-md-5">
                            <div class="card mb-4">
                                <div class="card-img container-iframe">
                                    <iframe src="{{$restaurante['url-photo']}}" position="center" width="348" height="402" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">{{$restaurante->name}}</h4>
                                    <p class="card-text">{{$restaurante->description}}</p>
                                </div>
                                <div class=" card-footer text-center text-muted">
                                    Precio: {{$restaurante->price}}
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No se encuentra ningun Hospedaje</p> 
                    @endforelse
                    </div>
            </div>
        </div>
        
        <div class="col text-center">
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Reservar</button>
        </div>
    </div> 
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reserva ahora</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="{{ route('tours.store')}}" method="POST">
                    @csrf
                    <h4><center>{{$tour->name}}</center></h4>

                        <input type="hidden" 
                        class="form-control" 
                        id="tour_id" 
                        name="tour_id"
                        value="{{$tour->id}}"
                        >
                    <div class="form-group">
                        <label for="">Ruta: </label>
                        <select class="form-control" style="width: 300px" id="route_id" name="route_id">
                            <option value="null">Seleccione una Ruta</option>
                        @foreach($rutas as $ruta)
                            <option 
                            value="{{$ruta->id}}">
                            {{$ruta->name}}
                            </option>
                        @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="">Hospedaje: </label>
                        <select class="form-control" style="width: 300px" id="lodging_id" name="lodging_id">
                            <option value="null">Seleccione un Hospedaje</option>
                        @foreach($hospedajes as $hospedaje)
                            <option 
                            value="{{$hospedaje->id}}">
                            {{$hospedaje->name}}
                            </option>
                        @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="">Restaurante: </label>
                        <select class="form-control" style="width: 300px" id="restaurant_id" name="restaurant_id">
                            <option value="null">Seleccione un Restaurante:</option>
                        @foreach($restaurantes as $restaurante)
                            <option 
                            value="{{$restaurante->id}}">
                            {{$restaurante->name}}
                            </option>
                        @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="">Fecha de partida: </label>
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" style="width: 300px" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
    
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div> 
                </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="Reservar">
                    </div>
                    </form>
        </div>
    </div>
</div>
