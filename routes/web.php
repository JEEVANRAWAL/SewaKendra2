<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class, 'index']);


Route::get('login',[UserController::class,'viewLoginForm'])->name('loginForm');
Route::get('registration',[UserController::class,'viewRegistrationForm'])->name('registrationForm');
Route::post('registration',[UserController::class, 'registration'])->name('registration');
Route::post('login',[AccessController::class, 'accessChecker'])->name('login');
Route::get('userlogin',[UserController::class,'userlogin'])->name('userlogin');
Route::get('userDashboard',[UserController::class,'userview'])->name('userDashboard');
Route::post('logout',[AccessController::class,'logout'])->name('logout');
Route::get('/services',[ServiceController::class, 'showServices'])->name('services');
Route::get('serviceBookingPage/{id}',[ServiceController::class, 'showClickedService']);
Route::post('booked',[ServiceController::class,'BookingDone'])->name('userBookingsubmitted');
Route::get('/UsersBookingHistory',[BookingController::class, 'showUsersBookingHistory'])->name('showUsersBooking');


//provider's Routes
Route::get('providerlogin',[ServiceProviderController::class,'providerlogin'])->name('providerlogin');
Route::get('/providerDashboard', [ServiceProviderController::class, 'provIndex'])->name('provDashboard');
Route::get('/provServices',[ServiceProviderController::class, 'showAssociateServices'])->name('provServices');
Route::get('/ServiceRegistration',[ServiceController::class,'showServiceRegistrationForm'] )->name('ServiceRegistration');
Route::post('/addServices',[ServiceController::class, 'addServices'])->name('addServices');
Route::post('/serviceUpdate',[ServiceController::class, 'serviceUpdate'])->name('serviceUpdate');
Route::get('deleteService/{id}',[ServiceController::class, 'DeleteService']);
Route::get('provBookings',[BookingController::class,'showAssociateBookings'])->name('provBookings');
Route::post('updateBookingStatus',[BookingController::class,'updateStatus'])->name('updateBookingStatus');
Route::post('providerRegistration',[ServiceProviderController::class,'providerRegistration'])->name('providerRegistration');
Route::get('providerRegistrationForm',[ServiceProviderController::class,'showRegistration'])->name('providerRegistrationForm');

//admin's Routes
Route::get('adminlogin',[AdminController::class, 'adminLogin'])->name('adminlogin');
Route::get('adminDashboard',[AdminController::class, 'viewAdmin'])->name('adminDashboard');
Route::get('pendingRequest',[AdminController::class, 'viewPendingProviders'])->name('pendingRequest');
Route::post('approveProvider',[ServiceProviderController::class,'approveProvider'])->name('approveProvider');
Route::get('viewUsers',[AdminController::class,'viewUsers'])->name('viewUsers');
Route::post('editOrdelete',[UserController::class,'editOrdelete'])->name('editOrdelete');
Route::get('viewServices',[AdminController::class,'viewServices'])->name('viewServices');
Route::post('serviceDelete',[AdminController::class,'DeleteService'])->name('DeleteService');
Route::post('UpdateService',[AdminController::class,'UpdateService'])->name('UpdateService');