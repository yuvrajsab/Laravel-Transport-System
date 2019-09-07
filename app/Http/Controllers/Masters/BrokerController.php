<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Broker;
use App\Models\Common\Country;
use App\Http\Requests\BrokerRequest;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brokers = Broker::all();
        return view('masters.broker.index')->withBrokers($brokers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('masters.broker.create')->withCountries($countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrokerRequest $request)
    {
        $broker = Broker::create([
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
                $broker->addMedia($file)->toMediaCollection('broker');
            }
        }

        return redirect()->route('broker.index')->withSuccess('Broker Created Successfully!');
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
    public function edit(Broker $broker)
    {
        $countries = Country::all();
        return view('masters.broker.edit')->withBroker($broker)->withCountries($countries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrokerRequest $request, $id)
    {
        Broker::where('id', $id)->update([
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
                Broker::find($id)->addMedia($file)->toMediaCollection('broker');
            }
        }

        return redirect()->route('broker.index')->withSuccess('Broker Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Broker $broker)
    {
        $broker->delete();
        return redirect()->route('broker.index')->withSuccess('Broker Deleted Successfully!');
    }

    public function deletefiles($broker_id, $media_id)
    {
        Broker::find($broker_id)->deleteMedia($media_id);
        return redirect()->route('broker.edit', $broker_id)->withSuccess('Attachment Deleted Successfully!');
    }
}
