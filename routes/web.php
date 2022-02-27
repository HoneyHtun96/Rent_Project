<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Apartment;
use App\Price;
use App\Type;
use App\Floor;
use App\Township;

// Route::get('/','MainController@index');

// //For Authentication
// Auth::routes();

// //Post Controller
// Route::resource('/post','PostController');

// //ProfileController
// Route::resource('/profile','ProfileController');

//For Authentication
Auth::routes();


//For Admin
//Route::resource('/admin','Admin\MainController');
Route::resource('/owner/floor','Admin\FloorController');
Route::resource('/owner/town','Admin\TownshipController');
Route::resource('/owner/type','Admin\TypeController');
Route::resource('/owner/post','Admin\PostController');

//For Owner
Route::resource('/owner','Owner\MainController');
Route::resource('/owner/profiles','Owner\ProfileController');
Route::resource('/owner/posts','Owner\PostController');



//For Frontend

// Route::get('/apartment',function(){
// 	return view('apartment');
// });

Route::get('/contact',function(){
	return view('contact');
});

Route::get('/home',function(){
		   $apartments = Apartment::orderBy('created_at','desc')->get();
        $pagination = Apartment::paginate(3);
        $townships = Township::all();
        $floors= Floor::all();
        $prices = DB::table('apartments')
            ->select('price')
            ->distinct()->get();
        return view('home',compact('apartments','pagination','townships','floors','prices'));
   
});

Route::get('locale/{locale}',function($locale){
	Session::put('locale',$locale);
	return redirect()->back();
});


Route::get('/','Frontend\MainController@index');

Route::resource('/apartmentdetail','Frontend\DetailsController');

Route::resource('/apartment','Frontend\ApartmentController');

Route::resource('/search','Frontend\SearchController');

Route::resource('/comment','Frontend\CommentController');

Route::resource('/grallery','Frontend\GralleryController');

Route::resource('/township','Frontend\TownshipController');

