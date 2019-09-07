<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VehicleOwner;
use App\Models\Common\Country;
use App\Http\Requests\VehicleOwnerRequest;

class VehicleOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle_owners = VehicleOwner::all();
        return view('masters.vehicle_owner.index')->with(['vehicle_owners' => $vehicle_owners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('masters.vehicle_owner.create')->withCountries($countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleOwnerRequest $request)
    {
        $vehicle_owner = VehicleOwner::create([
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
                $vehicle_owner->addMedia($file)->toMediaCollection('vehicle_owner');
            }
        }

        return redirect()->route('vehicle_owner.index')->withSuccess('Vehicle Owner Created Successfully!');
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
    public function edit(VehicleOwner $vehicle_owner)
    {
        $countries = Country::all();
        return view('masters.vehicle_owner.edit')->with(['vehicle_owner' => $vehicle_owner])->withCountries($countries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleOwnerRequest $request, $id)
    {
        VehicleOwner::where('id', $id)->update([
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
                VehicleOwner::find($id)->addMedia($file)->toMediaCollection('vehicle_owner');
            }
        }

        return redirect()->route('vehicle_owner.index')->withSuccess('Vehicle Owner Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleOwner $vehicle_owner)
    {
        $vehicle_owner->delete();
        return redirect()->route('vehicle_owner.index')->withSuccess('Vehicle Owner Deleted Successfully!');
    }

    public function deletefiles($vehicle_owner_id, $media_id)
    {
        VehicleOwner::find($vehicle_owner_id)->deleteMedia($media_id);
        return redirect()->route('vehicle_owner.edit', $vehicle_owner_id)->withSuccess('Attachment Deleted Successfully!');
    }
}
