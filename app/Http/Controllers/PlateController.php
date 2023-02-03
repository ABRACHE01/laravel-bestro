<?php

namespace App\Http\Controllers;

use App\Models\plate;
use App\Models\User;
use Illuminate\Http\Request;


class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plate = plate::latest()->paginate(20);
        $adminsCount = user::count();
        $platesCount = plate::count();
        return view('home',compact('plate','adminsCount','platesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
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
            'name'=>'required',
            'price'=>'required',
           'coption'=>'required'
        ]);  
        $plate=plate::create($request->all());
        return redirect()->route('home.index')
        ->with('success','Plate added succsesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plate = Plate::findOrFail($id);
        return view('pages.show',compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plate = Plate::findOrFail($id);
        return view('pages.edite',compact('plate'));
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'coption'=>'required'
        ]);  
        $plate = plate::find($id);
        $plate->update($request->all());
        return redirect()->route('home.index')
        ->with('success','Plate updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
           $plate = Plate::findOrFail($id);
         $plate->delete();
         return redirect(route('home.index'))
          ->with ('success','product deleted succsessflly');
    }


  
}
