<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }
        $avatar=auth()->user()->avatar;
        if($request->hasFile('avatar')){
            $avatar=$request->avatar->store('public');
        }
        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'avatar'=>$avatar
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }
}