<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Apartment;
use App\Township;
use App\Floor;
class TownshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $apartments = Apartment::orderBy('created_at','desc')->get();
        $pagination = Apartment::paginate(3);
        $townships = Township::all();

        // return view('apartment',compact('apartments','pagination','townships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartments = Apartment::orderBy('price','asc')->get();
        $pagination = Apartment::paginate(3);
        $townships = Township::all();
        $floors= Floor::all();
        $prices = DB::table('apartments')
            ->select('price')
            ->distinct()->get();
        return view('home',compact('apartments','pagination','townships','floors','prices'));
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
    public function show($id)
    {
        $id = request($id);
        // var_dump($id);
        // die();
        // $township = Township::all();
         $item = DB::table('apartments')
                ->select('apartments.*','townships.name')
                ->join('townships','apartments.township_id','=','townships.id')
                ->get();

            // var_dump($item);
            // die();

        return view('apartment',compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
