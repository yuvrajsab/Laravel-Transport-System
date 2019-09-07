<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Common\Country;
use App\Http\Requests\CustomerRequest;
use App\Models\Common\City;
use App\Models\Common\State;
use App\Models\Customer;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masters.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('masters.customer.create')->withCountries($countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $customer = Customer::create([
            'name' => $request->name,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'address_3' => $request->address_3,
            'landmark' => $request->landmark,
            'country_id' => $request->country,
            'state_id' => $request->state,
            'city_id' => $request->city,
            'pin' => $request->pin,
            'mobile_number' => $request->mobile_number,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'gstin' => $request->gstin,
            'pan' => $request->pan,
            'created_by' => $request->user()->name,
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $customer->addMedia($file)->toMediaCollection('customer');
            }
        }

        return redirect()->route('customer.index')->withSuccess('Customer Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return $customer->getMedia('customer');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $countries = Country::all();
        return view('masters.customer.edit')->withCustomer($customer)->withCountries($countries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        Customer::where('id', $id)->update([
            'name' => $request->name,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'address_3' => $request->address_3,
            'landmark' => $request->landmark,
            'country_id' => $request->country,
            'state_id' => $request->state,
            'city_id' => $request->city,
            'pin' => $request->pin,
            'mobile_number' => $request->mobile_number,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'gstin' => $request->gstin,
            'pan' => $request->pan,
            'updated_by' => $request->user()->name,
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                Customer::find($id)->addMedia($file)->toMediaCollection('customer');
            }
        }

        return redirect()->route('customer.index')->withSuccess('Customer Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        // $customer->delete();
        return redirect()->route('customer.index')->withSuccess('Customer Deleted Successfully!');
    }

    public function deletefiles($customer_id, $media_id)
    {
        Customer::find($customer_id)->deleteMedia($media_id);
        return redirect()->route('customer.edit', $customer_id)->withSuccess('Attachment Deleted Successfully!');
    }
}
