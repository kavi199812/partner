<?php

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
    return view('welcome');
});

//HomePage Routes
Route::get('/',[\App\Http\Controllers\HomepageController::class,'index'])->name('home');


//Partner Routes
Route::get('/login',[\App\Http\Controllers\PartnersLoginNregisterController::class,'login'])->name('partner-login');
Route::get('/register',[\App\Http\Controllers\PartnersLoginNregisterController::class,'register'])->name('partner-register');
Route::post('/createuser',[\App\Http\Controllers\PartnersLoginNregisterController::class,'createuser'])->name('create-new-partner');
Route::post('/checkpartner',[\App\Http\Controllers\PartnersLoginNregisterController::class,'checkpartner'])->name('checkpartner');
Route::get('/dashboard',[\App\Http\Controllers\PartnerController::class,'dashboard'])->name('partner-dashboard');
Route::get('partner/notifications/read', [\App\Http\Controllers\NotificationController::class,'read'])->name('partner.notifications.read');
Route::get('partner/notifications/read-single/{id}', [\App\Http\Controllers\NotificationController::class,'SingleRead'])->name('partner.notifications.single.read');

Route::get('/addadvertisement',[\App\Http\Controllers\AdvertisementController::class,'create'])->name('addadvertisement');
Route::post('/storeadvertisement',[\App\Http\Controllers\AdvertisementController::class,'store'])->name('storeadvertisement');
Route::get('/viewadvertisement',[\App\Http\Controllers\AdvertisementController::class,'index'])->name('viewadvertisement');
Route::get('/showadvertisment/{id}',[\App\Http\Controllers\AdvertisementController::class,'show'])->name('showadvertisment');
Route::get('deletead/{id}', [App\Http\Controllers\AdvertisementController::class, 'destroy'])->name('advertisement.delete');

Route::get('/test-addadvertisement',[\App\Http\Controllers\AdvertisementController::class,'test']);

//Broker
Route::get('/ads',[\App\Http\Controllers\broker\BrokerDashboardController::class,'index'])->name('ads');
Route::get('/singlead/{id}',[\App\Http\Controllers\broker\BrokerDashboardController::class,'show'])->name('partner.singlead');
Route::get('/referral/{id}',[\App\Http\Controllers\broker\BrokerDashboardController::class,'generateReferral'])->name('get.referral.code');
Route::get('/referralcodes',[\App\Http\Controllers\broker\BrokerDashboardController::class,'referralCodes'])->name('referralcodes');

//Customer
Route::get('/rc/{id}',[\App\Http\Controllers\customer\CustomerController::class,'getRefCustomer'])->name('customer.rc');




