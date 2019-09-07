<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Common\Country;
use App\Models\Customer;
use App\Http\Requests\ConsignorRequest;
use App\Models\Consignor;

class ConsignorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consingors = Consignor::all();
        return view('masters.consignor.index')->withConsignors($consingors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $customers = Customer::all();
        return view('masters.consignor.create')->withCountries($countries)->withCustomers($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsignorRequest $request)
    {
        $consignor = Consignor::create([
            'customer_id' => $request->customer,
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
                $consignor->addMedia($file)->toMediaCollection('consignor');
            }
        }

        return redirect()->route('consignor.index')->withSuccess('Consignor Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Consignor $consignor)
    {
        return $consignor->getMedia('consignor');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Consignor $consignor)
    {
        $countries = Country::all();
        $customers = Customer::all();
        return view('masters.consignor.edit')->withConsignor($consignor)->withCustomers($customers)->withCountries($countries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConsignorRequest $request, $id)
    {
        Consignor::where('id', $id)->update([
            'customer_id' => $request->customer,
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
                Consignor::find($id)->addMedia($file)->toMediaCollection('consignor');
            }
        }

        return redirect()->route('consignor.index')->withSuccess('Consignor Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consignor $consignor)
    {
        $consignor->delete();
        return redirect()->route('consignor.index')->withSuccess('Consignor Deleted Successfully!');
    }

    public function deletefiles($consignor_id, $media_id)
    {
        Consignor::find($consignor_id)->deleteMedia($media_id);
        return redirect()->route('consignor.edit', $consignor_id)->withSuccess('Attachment Deleted Successfully!');
    }
}
