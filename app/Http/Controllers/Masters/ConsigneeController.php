<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Consignee;
use App\Models\Common\Country;
use App\Models\Customer;
use App\Http\Requests\ConsigneeRequest;

class ConsigneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consignees = Consignee::all();
        return view('masters.consignee.index')->withConsignees($consignees);
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
        return view('masters.consignee.create')->withCountries($countries)->withCustomers($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsigneeRequest $request)
    {
        $consignee = Consignee::create([
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
                $consignee->addMedia($file)->toMediaCollection('consignee');
            }
        }

        return redirect()->route('consignee.index')->withSuccess('Consignee Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Consignee $consignee)
    {
        $customers = Customer::all();
        $countries = Country::all();
        return view('masters.consignee.edit')->withConsignee($consignee)->withCustomers($customers)->withCountries($countries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConsigneeRequest $request, $id)
    {
        Consignee::where('id', $id)->update([
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
                Consignee::find($id)->addMedia($file)->toMediaCollection('consignee');
            }
        }

        return redirect()->route('consignee.index')->withSuccess('Consignee Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consignee $consignee)
    {
        $consignee->delete();
        return redirect()->route('consignee.index')->withSuccess('Consignee Deleted Successfully!');
    }

    public function deletefiles($consignor_id, $media_id)
    {
        Consignee::find($consignor_id)->deleteMedia($media_id);
        return redirect()->route('consignee.edit', $consignor_id)->withSuccess('Attachment Deleted Successfully!');
    }
}
