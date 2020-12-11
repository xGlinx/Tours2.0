<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Tour;
use App\Route;
use App\Restaurant;
use App\Lodging;
use App\Reserve;


class ToursController extends Controller
{
    public function index()
    {
        $tours=Tour::orderBy('id', 'asc')->get(['id', 'url-front', 'front-title', 'name', 'url-photo', 'description', 'duration', 'price']);
        return view('user.tours', compact('tours'));
    }

    public function show(Tour $tour){
        
        $rutas=Route::whereTour_id($tour->id)->orderBy('position', 'asc')->get(['id', 'name', 'url-photo', 'description', 'position']);
        $hospedajes=Lodging::whereTour_id($tour->id)->orderBy('position', 'asc')->get(['id', 'name', 'url-photo', 'description', 'position', 'price']);
        $restaurantes=Restaurant::whereTour_id($tour->id)->orderBy('position', 'asc')->get(['id', 'name', 'url-photo', 'description', 'position', 'price']);
        return view('user/unittour', compact('tour', 'rutas', 'hospedajes', 'restaurantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'                  => 'required',
        ]);

        $request['user_id']=Auth::user()->id;
        $reserve = Reserve::create($request->all()); 
    
        return redirect()->route('tours.index')
            ->with('status_success','Reserva guardada satisfactoriamente'); 
    }

    public function edit()
    {
        return view('user/reserve', compact('tour'));
    }

}
