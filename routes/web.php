<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateUsers;
use Illuminate\Support\Facades\Auth;
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


Route::middleware(['auth'])->group(function(){
    
    Route::get('/dashboard', function () {
       if(Auth::user()->roles != '1'){
           return redirect('userdashbord');
       }
        return view('dashboard');
    })->name('dashboard');


    Route::get('userdashbord',function(){
        return view('userdashboard');
    })->name('userdashbord');
    //Create  user resource.
    Route::resource('/create-users',CreateUsers::class);
  
});



require __DIR__.'/auth.php';
