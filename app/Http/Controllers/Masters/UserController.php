<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Common\State;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Models\Common\City;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masters.user.index');        
    }    

    /**
     * Show the form for creating a new resource.dashboard/
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Indian States
        $states = State::where('country_id', 101)->get();
        return view('masters.user.create')->withStates($states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user_id = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'state_id' => $request->state,
            'city_id' => $request->city,
            'zip_code' => $request->zip_code,
            'created_by' => $request->user()->name,
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                User::find($user_id)->addMedia($file)->toMediaCollection('user');
            }
        }

        return redirect()->route('user.index')->withSuccess('User Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user->getMedia('profile_img');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        // Indian States
        $states = State::where('country_id', 101)->get();
        return view('masters.user.edit')->withUser($user)->withStates($states);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'state_id' => $request->state,
            'city_id' => $request->city,
            'zip_code' => $request->zip_code,
            'updated_by' => $request->user()->name, 
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                User::find($id)->addMedia($file)->toMediaCollection('user');
            }
        }

        return redirect()->route('user.index')->withSuccess('User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $user = User::findOrFail($id);
        // $user->delete();

        return redirect()->route('user.index')->withSuccess('User Deleted Successfully!');
    }

    public function deletefiles($user_id, $media_id)
    {
        User::find($user_id)->deleteMedia($media_id);
        return redirect()->route('user.edit', $user_id)->withSuccess('Attachment Deleted Successfully!');
    }
}
