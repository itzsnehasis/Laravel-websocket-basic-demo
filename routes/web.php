<?php

use Illuminate\Support\Facades\Route;
use App\Events\WebsocketDemoEvent;
use Illuminate\Http\Request; 


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
    return view('welcome');
});

Route::post('lol', function (Request $request) {
    if($request->message == ""){
        //donothing
    }

    else{
        if(isset($request->name))
            $ip = $request->name;
        else 
            $ip = 'anonymous';

        $data = array('id'=>$ip, "msg"=> $request->message);
        event(new App\Events\WebsocketDemoEvent($data));
        return response()->json(['success'=>'ok']);
    }
});
