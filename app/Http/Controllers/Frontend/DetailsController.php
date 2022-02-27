<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Apartment;
use App\User;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function show($id)
    {
        //
         $apartment= Apartment::find($id);
         $user_id= $apartment->user_id;
        // die();
        $p = DB::table('apartments')
            ->select('apartments.price')
            ->where('apartments.id',$id)
            ->get();
        //var_dump($p);
        foreach ($p as $price) {
            $price = $price->price;
        }
      
        $maxprice= $price +intval('50000'); 
        $minprice = $price - intval('50000');
        $related_data= DB::table('apartments')
                    ->select('apartments.*')
                    ->whereBetween('price', [$minprice, $maxprice])
                    ->get();

         $user= DB::table('users')
                ->select('users.*')
                ->join('apartments','apartments.user_id','=','users.id')
                ->where('users.id',$user_id)
                ->distinct()
                ->get();

        // var_dump($user);
        // die();

         return view ('apartment_details',compact('apartment','related_data','user'));  
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
