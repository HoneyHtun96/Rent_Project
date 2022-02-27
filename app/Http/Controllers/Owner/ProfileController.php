<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
class ProfileController extends Controller
{
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
        $user_id = Auth()->id();
        // var_dump($user_id);
        $user = User::find($user_id);
        return view('owner.profile',compact('user'));
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

        //Validate
        // $request->validate([
            
        //     'name' => 'required',
            
        //     'eamil'=>'required',
        //     'newpassword'=>'required',
        //     'phone'=>'required|min:11'
        // ]);

        //Upload File
         if($request->hasfile('newphoto'))
            {
                $photo = $request->file('newphoto');
                $name = $photo->getClientOriginalName();
                $photo->move(public_path().'/storage/profile/',$name);
                $photo = 'storage/profile/'.$name;
            }else{
                if($request->hasfile('oldphoto'))
                    {
                        $photo = $request->file('oldphoto');
                        $name = $photo->getClientOriginalName();
                        $photo->move(public_path().'/storage/profile/',$name);
                        $photo = 'storage/profile/'.$name;
                    }
                    else{
                        $photo = 'null';
                    }
            }
            // dd($photo);
            // $newpassword = request('newpassword');
            // if($newpassword)
            // {
            //     $newPass = $newpassword;
            // }
            // else{
            //     $newPass = request('password');
            // }

            //dd($newPass);
        //Update User
        
        $user = User::find($id);
        $user->name = request('name');
        $user->address = $photo;
        $user->email = request('email');
        $user->phone = request('phone');
        $user->password = request('password');
        $user->save();
        return redirect('/owner');
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
