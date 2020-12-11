<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lodging;
use App\Tour;


class LodgingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lodgings=Lodging::orderBy('id','Asc')->paginate(15);
        return view('admin.lodging.index', compact('lodgings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tours = Tour::get();

        return view('admin.lodging.create', compact('tours'));
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
            'position'              => 'required|max:250| unique:lodgings,position',
            'price'                 => 'required',
        ]);
        
        $lodging=Lodging::create($request->all()); 
    
        return redirect()->route('lodging.index')
            ->with('status_success','Hospedaje creado creado satisfactoriamente'); 
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
    public function edit(Lodging $lodging)
    {
        $tours= Tour::orderBy('id','Asc')->get();

        return view('admin.lodging.edit', compact('tours','lodging'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lodging $lodging)
    {
        $request->validate([
            'name'                  => 'required|max:250',
            'url-photo'             => 'required',
            'description'           => 'required|max:250',
            'position'              => 'required|max:250',
        ]);

        $lodging->update($request->all());

        return redirect()->route('lodging.index')
            ->with('status_success','Hspedaje editado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lodging $lodging)
    {
        $lodging->delete();

        return redirect()->route('lodging.index')
            ->with('status_success','Hospedaje removido correctamente'); 
    }
}
