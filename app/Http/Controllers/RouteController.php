<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use App\Tour;


class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes=Route::orderBy('id','Asc')->paginate(15);
        return view('admin.route.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tours = Tour::get();

        return view('admin.route.create', compact('tours'));
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
            'position'              => 'required|max:250| unique:routes,position',
        ]);

        $route = Route::create($request->all()); 

        return redirect()->route('route.index')
            ->with('status_success','Ruta creada satisfactoriamente'); 
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
    public function edit(Route $route)
    {
        $tours= Tour::orderBy('id','Asc')->get();

        return view('admin.route.edit', compact('tours','route'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Route $route)
    {
        $request->validate([
            'name'                  => 'required|max:250',
            'url-photo'             => 'required',
            'description'           => 'required|max:250',
            'position'              => 'required|max:250',
        ]);

        $route->update($request->all());

        return redirect()->route('route.index')
            ->with('status_success','Ruta editado satisfactoriamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $route->delete();

        return redirect()->route('route.index')
            ->with('status_success','Ruta removida correctamente'); 
    }
}
