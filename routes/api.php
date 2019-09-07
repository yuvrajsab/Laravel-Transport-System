<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Common\City;
use App\Models\Common\State;
use App\Models\Customer;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// get cities
Route::get('state/{state_id}', function($state_id) {
    return City::where('state_id', $state_id)->get();
});

// get states
Route::get('country/{country_id}', function($country_id) {
    return State::where('country_id', $country_id)->get();
});

Route::get('user/getUsers', function() {
    $users = User::with(['state','city'])->select(['id','name','email','address','state_id','city_id','zip_code','created_by','updated_by']);
            
    return DataTables::of($users)
        ->addColumn('action', function($user) {
            return '<div class="btn-group">
                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-ellipsis-h"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="'.route('user.show', $user->id).'">Show</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="'.route('user.edit', $user->id).'">Edit</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <form action="'.route('user.destroy', $user->id).'" method="post">
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="dropdown-button deletebutton">Delete</button>
                        </form>
                    </li>
                </ul>
            </div>';
        })
        ->make(true);
})->name('user.getUsers');

Route::get('customer/getCustomers', function() {
    $customers = Customer::with(['state','city'])->select(['id','name','email','address_1','state_id','city_id','pin','mobile_number','gstin','pan','created_by','updated_by']);

    return DataTables::of($customers)
        ->addColumn('action', function($customer) {
            return '<div class="btn-group">
                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-ellipsis-h"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="'.route('customer.show', $customer->id).'">Show</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="'.route('customer.edit', $customer->id).'">Edit</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <form action="'.route('customer.destroy', $customer->id).'" method="post">
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="dropdown-button deletebutton">Delete</button>
                        </form>
                    </li>
                </ul>
            </div>';
        })
        ->make(true);
})->name('customer.getCustomers');