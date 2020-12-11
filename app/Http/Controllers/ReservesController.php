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

class ReservesController extends Controller
{
    public function index()
    {
        $reserves=Reserve::whereUser_id(Auth::user()->id)->orderBy('id', 'asc')->get(['id', 'user_id', 'tour_id', 'route_id', 'lodging_id', 'restaurant_id', 'date', 'state']);
        $users=User::orderBy('id','Asc')->paginate(15);
        $tours=Tour::orderBy('id','Asc')->paginate(15);
        $routes=Route::orderBy('id','Asc')->paginate(15);
        $lodgings=Lodging::orderBy('id','Asc')->paginate(15);
        $restaurants=Restaurant::orderBy('id','Asc')->paginate(15);

        return view('user.reserve', compact('reserves', 'users', 'tours', 'routes', 'lodgings', 'restaurants'));
    }
}
