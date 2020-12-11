<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Lodging;

class FrontController extends Controller
{
    public function index()
    {
        $restaurantes=Restaurant::orderBy('position', 'asc')->get(['name', 'url-photo', 'description', 'position']);
        $hospedajes=Lodging::whereTour_id(3)->orderBy('position', 'asc')->get(['name', 'url-photo', 'description', 'position']);
        return view('welcome', compact('restaurantes', 'hospedajes'));
    }
}
