<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Common\Country;
use App\Models\VehicleOwner;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('masters.vehicle.index')->withVehicles($vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $vehicle_owners = VehicleOwner::all();
        return view('masters.vehicle.create')->withCountries($countries)->with(['vehicle_owners' => $vehicle_owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $vehicle = Vehicle::create([
            'owner_id' => $request->owner,
            'registration_number' => $request->registration_number,
            'registration_date' => date('Y-m-d', strtotime(str_replace('-', '/', $request->registration_date))),
            'type' => $request->type,
            'body' => $request->body,
            'engine_number' => $request->engine_number,
            'chassis_number' => $request->chassis_number,
            'capacity' => $request->capacity,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'address_3' => $request->address_3,
            'landmark' => $request->landmark,
            'country_id' => $request->country,
            'state_id' => $request->state,
            'city_id' => $request->city,
            'pin' => $request->pin,
            'mobile_number' => $request->mobile_number,
            'alternate_number' => $request->alternate_number,
            'created_by' => $request->user()->name,
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $vehicle->addMedia($file)->toMediaCollection('vehicle');
            }
        }

        return redirect()->route('vehicle.index')->withSuccess('Vehicle Created Successfully!');
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
    public function edit(Vehicle $vehicle)
    {
        $vehicle_owners = VehicleOwner::all();
        $countries = Country::all();
        return view('masters.vehicle.edit')->withVehicle($vehicle)->withCountries($countries)->with(['vehicle_owners' => $vehicle_owners]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleRequest $request, $id)
    {
        Vehicle::where('id', $id)->update([
            'owner_id' => $request->owner,
            'registration_number' => $request->registration_number,
            'registration_date' => date('Y-m-d', strtotime(str_replace('-', '/', $request->registration_date))),
            'type' => $request->type,
            'body' => $request->body,
            'engine_number' => $request->engine_number,
            'chassis_number' => $request->chassis_number,
            'capacity' => $request->capacity,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'address_3' => $request->address_3,
            'landmark' => $request->landmark,
            'country_id' => $request->country,
            'state_id' => $request->state,
            'city_id' => $request->city,
            'pin' => $request->pin,
            'mobile_number' => $request->mobile_number,
            'alternate_number' => $request->alternate_number,
            'updated_by' => $request->user()->name,
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                Vehicle::find($id)->addMedia($file)->toMediaCollection('vehicle');
            }
        }

        return redirect()->route('vehicle.index')->withSuccess('Vehicle Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicle.index')->withSuccess('Vehicle Deleted Successfully!');
    }

    public function deletefiles($vehicle_id, $media_id)
    {
        Vehicle::find($vehicle_id)->deleteMedia($media_id);
        return redirect()->route('vehicle.edit', $vehicle_id)->withSuccess('Attachment Deleted Successfully!');
    }
}
