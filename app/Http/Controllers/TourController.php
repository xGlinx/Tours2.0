<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour; 
use Session;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours=Tour::orderBy('id','Asc')->paginate(15);
        return view('admin.tour.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tour.create');
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
            'description'           => 'required|max:250',
            'url-front'             => 'required',
            'front-title'           => 'required|max:250',
            'url-photo'             => 'required',
            'duration'              => 'required|max:250',
            'price'                 => 'required',
            'price-travel'          => 'required',
        ]);
        
        $tour = Tour::create($request->all()); 
    
        return redirect()->route('tour.index')
            ->with('status_success','Tour creado satisfactoriamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        return view('admin.tour.edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tour $tour)
    {
        $request->validate([
            'name'                  => 'required|max:250',
            'description'           => 'required|max:250',
            'url-front'             => 'required',
            'front-title'           => 'required|max:250',
            'url-photo'             => 'required',
            'duration'              => 'required|max:250',
            'price'                 => 'required',
            'price-travel'          => 'required',
            
        ]);

        $tour->update($request->all());
        
        return redirect()->route('tour.index')
            ->with('status_success','Tour editado satisfactoriamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();

        return redirect()->route('tour.index')
            ->with('status_success','Tour removido satisfactoriamente'); 
    }

}
