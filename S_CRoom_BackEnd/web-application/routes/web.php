<?php

use App\Http\Controllers\SessionController;
use App\WebSocket\SocketServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
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
Route::get('/test', function (){
    return view('test');
});

Route::get('register', function (){
   return view('register');
});
Route::get('login', [SessionController::class, 'create']);
Route::post('login', [SessionController::class, 'store']);
Route::get('logout/{role}', [SessionController::class, 'destroy']);

//Route::post('register/cam', 'RegisterController@open_cam');
Route::post('register/cam', [RegisterController::class, 'open_cam']);

//Route::get('/main', function () {
//    return view('main');
//});
Route::get('stdlog', function () {
    return view('studentLog');
});
Route::get('/proflog', function () {
    return view('profLog');
})->middleware('professor');
Route::get('/proflive', function () {
    return view('profLive');
});
Route::get('/stdlive', function () {
    return view('studentLive');
});
Route::get('/pp', function () {
    return view('pp');
})->middleware('professor');
Route::get('student-profile', function () {
    return view('student-profile');
})->middleware('student');

Route::get('/admin', function () {
    return view('admin');
})->middleware('admin');

Route::get('/prof-socket', function () {
    return view('professor-socket');
});
