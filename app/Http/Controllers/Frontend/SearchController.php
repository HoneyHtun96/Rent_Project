<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Township;
use App\Apartment;
use App\Floor;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $t = request('township');
         $f = request('floor');
         $p1 = request('price1');
         $p2 = request("price2");
            
         // var_dump($t);
         // var_dump($f);
         // var_dump($p);
         // die();
         $townships = Township::all();
         $floors = Floor::all();
        
        // $township=Township::where('id','LIKE','%'.$t.'%')->get();
        // $floor=Floor::where('id','LIKE','%'.$f.'%')->get();
        // $price=Price::where('id','LIKE','%'.$p.'%')->get();

        $item= DB::table('apartments')
                ->select('apartments.*')
                ->join('townships','apartments.township_id','=','townships.id')
                ->join('floors','apartments.floor_id','=','floors.id')
                ->where('floors.id',$f)
                ->where('townships.id',$t)
                ->where('apartments.price',$p1)
                ->orWhere('apartments.price',$p2)
                ->orderBy('created_at','desc')
                ->get();
                
        // foreach ($item as $i) {
           
        //    $images = json_decode($i->image,true);
           
        // }   

               
        return view('search_detail_apartment',compact('townships','floors','item'));
        
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
