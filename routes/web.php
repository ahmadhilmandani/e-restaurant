<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::controller(AuthController::class)->group(function (){
    Route::get('/login', 'loginPage')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'registerPage');
    Route::post('/register', 'register');
});

Route::get('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login');
});


Route::resource('/rsvp', controller: ReservationsController::class)->except([
    "create"
]);
Route::get('/rsvp/create/{id}', action: [ReservationsController::class, 'create']);
Route::get('/restaurant/{id}', [RestaurantController::class, 'show']);

Route::get('/food/{id}', function ($id) {
    return view('detailFood', ["id" => $id ]);
})->name('detailFood')->middleware('checkToken');