<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Tour;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants=Restaurant::orderBy('id','Asc')->paginate(15);
        return view('admin.restaurant.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tours = Tour::get();

        return view('admin.restaurant.create', compact('tours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|max:250',
            'url-photo'             => 'required',
            'description'           => 'required|max:250',
            'position'              => 'required|max:250| unique:restaurants,position',
            'price'                 => 'required',
        ]);
        
        $restaurant = Restaurant::create($request->all()); 
    
        return redirect()->route('restaurant.index')
            ->with('status_success','Restaurant creado satisfactoriamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $tours= Tour::orderBy('id','Asc')->get();

        return view('admin.restaurant.edit', compact('tours','restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name'                  => 'required|max:250',
            'url-photo'             => 'required',
            'description'           => 'required|max:250',
            'position'              => 'required|max:250',
        ]);

        $restaurant->update($request->all());

        return redirect()->route('restaurant.index')
            ->with('status_success','Restaurant editado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('restaurant.index')
            ->with('status_success','Restaurante removida correctamente'); 
    }
}
