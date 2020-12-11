<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserve;
use App\User;
use App\Tour;
use App\Route;
use App\Lodging;
use App\Restaurant;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reserves=Reserve::orderBy('id','Asc')->paginate(15);
        $users=User::orderBy('id','Asc')->paginate(15);
        $tours=Tour::orderBy('id','Asc')->paginate(15);
        $routes=Route::orderBy('id','Asc')->paginate(15);
        $lodgings=Lodging::orderBy('id','Asc')->paginate(15);
        $restaurants=Restaurant::orderBy('id','Asc')->paginate(15);

        return view('admin.reserve.index', compact('reserves', 'users', 'tours', 'routes', 'lodgings', 'restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reserve $reserve)
    {
        return view('admin.reserve.show', compact('reserve'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserve $reserve)
    {

        return view('admin.reserve.edit', compact('reserve'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserve $reserve)
    {
        $request->validate([

            'state'  => 'integer| in:0,1,2',
            
        ]);

        $reserve->update($request->all());

        return redirect()->route('reserve.index', compact ('reserve'))
        ->with('status_success','Reserva actualizado correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
