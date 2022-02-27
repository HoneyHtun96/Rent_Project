<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Floor;
use App\Apartment;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floor = Floor::all();
        return view('admin.showfloor',compact('floor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
       return view('admin.floor');

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
            'floor'=>'required|min:1',
           
         ]);

          Floor::create([
         "name"=>request('floor')
         ]);
          return redirect('/owner/floor');
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
    public function edit($id)
    {
        
        $floor=Floor::find($id);
        return view('admin.editfloor',compact('floor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
        'floor'=>'required'
        
      ]);

      $floor = Floor::find($id);
      $floor->name = $request->get('floor');
      $floor->save();

      return redirect('/owner/floor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $floor = Floor::find($id);
        foreach ($floor->apartments as $apartment) {
            $apartment->delete();
        }
        $floor->delete();
        return redirect('/owner/floor');
    }
}
