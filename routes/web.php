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

// Authentication
Auth::routes(['register' => false]);

// Dashboard
Route::get('/', 'HomeController@index')->name('home');

// Masters
Route::prefix('masters')->middleware('auth')->group(function() {
    // Customer
    Route::resource('customer', 'Masters\CustomerController');
    Route::get('customer/{id}/deletefiles/{media_id}', 'Masters\CustomerController@deletefiles')->name('customer.deletefiles');
    // Consignor
    Route::resource('consignor', 'Masters\ConsignorController');
    Route::get('consignor/{id}/deletefiles/{media_id}', 'Masters\ConsignorController@deletefiles')->name('consignor.deletefiles');
    // Consignee
    Route::resource('consignee', 'Masters\ConsigneeController');
    Route::get('consignee/{id}/deletefiles/{media_id}', 'Masters\ConsigneeController@deletefiles')->name('consignee.deletefiles');
    // Broker
    Route::resource('broker', 'Masters\BrokerController');
    Route::get('broker/{id}/deletefiles/{media_id}', 'Masters\BrokerController@deletefiles')->name('broker.deletefiles');
    // VehicleOwner
    Route::resource('vehicle_owner', 'Masters\VehicleOwnerController');
    Route::get('vehicle_owner/{id}/deletefiles/{media_id}', 'Masters\VehicleOwnerController@deletefiles')->name('vehicle_owner.deletefiles');
    // Vehicle
    Route::resource('vehicle', 'Masters\VehicleController');
    Route::get('vehicle/{id}/deletefiles/{media_id}', 'Masters\VehicleController@deletefiles')->name('vehicle.deletefiles');
    // Driver
    Route::resource('driver', 'Masters\DriverController');
    Route::get('driver/{id}/deletefiles/{media_id}', 'Masters\DriverController@deletefiles')->name('driver.deletefiles');
    // User
    Route::resource('user', 'Masters\UserController');
    Route::get('user/{id}/deleteprofileimg', 'Masters\UserController@deleteProfileImg')->name('user.deleteprofileimg');
});

// Consignment
Route::prefix('consignment')->middleware('auth')->group(function() {
    Route::resource('booking', 'Consignment\ConsignmentController');
});