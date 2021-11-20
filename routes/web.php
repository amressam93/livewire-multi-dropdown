<?php


use App\Http\Livewire\CountryStateCity;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {



    $test = City::where('id', 4)->pluck('latitude')->first();
    return $test;die();

    //return view('welcome');
    //$states = $this->Cities = city::where('stateID',5)->get();;
    //return$states;

    //$test = \App\Models\Country::where('name','china')->get();   // country id = 2
    //$state = \App\Models\State::where('country_id',2)->get();

    //$states = '';

    $path = storage_path() . "/json/cities.json"; // ie: /var/www/laravel/app/storage/json/filename.json

    $states = json_decode(file_get_contents($path), true);


    //$cities = (object)$states;

    //return gettype($cities);die();

    //$states = json_decode($states);



   foreach ($states as $state)
   {



        $cityname = $state['cityName'];
        $latitude = $state['latitude'];
        $langtuide = $state['longitude'];




//        \App\Models\City::create([
//
//           'state_id'      => 5,
//           'cityName' => $cityname,
//            'latitude' => $latitude,
//            'longitude' => $langtuide
//
//       ]);


   }


});


//Route::view('project','livewire.home');
Route::get('project',CountryStateCity::class);
