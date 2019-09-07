<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Common\Country;
use App\Http\Requests\DriverRequest;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('masters.driver.index')->withDrivers($drivers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('masters.driver.create')->withCountries($countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverRequest $request)
    {
        $driver = Driver::create([
            'name' => $request->name,
            'licence_number' => strtoupper($request->licence_number),
            'licence_rto' => $request->licence_rto,
            'licence_validity' => date('Y-m-d', strtotime(str_replace('-', '/', $request->licence_validity))),
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
                $driver->addMedia($file)->toMediaCollection('driver');
            }
        }

        return redirect()->route('driver.index')->withSuccess('Driver Created Successfully!');    
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
    public function edit(Driver $driver)
    {
        $countries = Country::all();
        return view('masters.driver.edit')->withCountries($countries)->withDriver($driver);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DriverRequest $request, $id)
    {
        Driver::where('id', $id)->update([
            'name' => $request->name,
            'licence_number' => strtoupper($request->licence_number),
            'licence_rto' => $request->licence_rto,
            'licence_validity' => date('Y-m-d', strtotime(str_replace('-', '/', $request->licence_validity))),
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
                Driver::find($id)->addMedia($file)->toMediaCollection('driver');
            }
        }

        return redirect()->route('driver.index')->withSuccess('Driver Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('driver.index')->withSuccess('Driver Deleted Successfully');
    }

    public function deletefiles($driver_id, $media_id)
    {
        Driver::find($driver_id)->deleteMedia($media_id);
        return redirect()->route('driver.edit', $driver_id)->withSuccess('Attachment Deleted Successfully!');
    }
}
