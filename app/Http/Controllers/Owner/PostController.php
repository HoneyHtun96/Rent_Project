 <?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Apartment;
use App\Floor;
use App\Township;
use App\Type;

class PostController extends Controller
{

    public function __construct($value='')
    {
        $this->middleware('auth',['except'=>['show']]);
    }
    
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
        // return "hello";
        $floors = Floor::all();
        $townships = Township::all();
        $types = Type::all();
        
       return view('owner.postCreate',compact('floors','townships','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'photo' =>'required|min:3',
            'photo.*' => 'mimes:jpeg,jpg,png|max:2048',
            'description'=>'required|min:25'
        ]);
        

        //Upload Files
        if($request->hasfile('photo'))
            {
                foreach($request->file('photo') as $image)
                {
                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/storage/image/', $name);  
                    $data[] = '/storage/image/'.$name;  
                }
            }
        // dd($data);
         
       // Store Data
        $apartment= new Apartment();
        $apartment->image=json_encode($data);
        $apartment->user_id=Auth()->id();
        $apartment->township_id=request('township');
        $apartment->type_id=request('type');
        $apartment->floor_id=request('floor');
        $apartment->price=request('price');
        $apartment->description=request('description'); 
        $apartment->lat = request('lat');
        $apartment->lng = request('lng');
        $apartment->save();
       

       return redirect('/owner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::find($id);
        return view('owner.postdetail',compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $apartment = Apartment::find($id);
        $floors = Floor::all();
        $townships = Township::all();
        $types = Type::all();
        
        return view('owner.postEdit',compact('apartment','floors','townships','types'));
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
        // dd($request);
        // Validate
        $request->validate([
            'photo' =>'required|min:3',
            'photo.*' => 'mimes:jpeg,jpg,png|max:2048',
            'description'=>'required|min:25'
        ]);

        //Upload Files
        if($request->hasfile('photo'))
            {
                foreach($request->file('photo') as $image)
                {
                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/storage/image/', $name);  
                    $data[] = '/storage/image/'.$name;  
                }
            }else
            {
                foreach($request->file('oldimage') as $image)
                {
                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/storage/image/', $name);  
                    $data[] = '/storage/image/'.$name;  
                }
            }
        // Store Data
        $apartment= Apartment::find($id);
        $apartment->image=json_encode($data);
        $apartment->user_id=Auth()->id();
        $apartment->township_id=request('township');
        $apartment->type_id=request('type');
        $apartment->floor_id=request('floor');
        $apartment->price=request('price');
        $apartment->description=request('description'); 
        $apartment->lat = request('lat');
        $apartment->lng = request('longitude');
        $apartment->save();
       

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
       
        $apartment = Apartment::find($id);

        $apartment->delete();

        return redirect('/owner');
    }

}
