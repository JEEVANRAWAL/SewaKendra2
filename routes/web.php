<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('login',[UserController::class,'viewLoginForm'])->name('loginForm');
Route::get('registration',[UserController::class,'viewRegistrationForm'])->name('registrationForm');
Route::post('registration',[UserController::class, 'registration'])->name('registration');
Route::post('login',[AccessController::class, 'accessChecker'])->name('login');
Route::get('userlogin',[UserController::class,'userlogin'])->name('userlogin');
Route::get('userDashboard',[UserController::class,'userview'])->name('userDashboard');
Route::post('logout',[AccessController::class,'logout'])->name('logout');
Route::get('/services',[ServiceController::class, 'showServices']);

//provider's Routes
Route::get('providerlogin',[ServiceProviderController::class,'providerlogin'])->name('providerlogin');
Route::view('/providerDashboard', 'serviceProvider.dashboard')->name('provDashboard');
Route::get('/provServices',[ServiceProviderController::class, 'showAssociateServices'])->name('provServices');
Route::get('/ServiceRegistration',[ServiceController::class,'showServiceRegistrationForm'] )->name('ServiceRegistration');
Route::post('/addServices',[ServiceController::class, 'addServices'])->name('addServices');



Route::post('adminlogin',[AdminController::class, 'adminLogin'])->name('adminlogin');
Route::get('adminDashboard',[AdminController::class, 'viewAdmin']);