<?php

namespace App\Http\Controllers;

use App\Models\BusinessSetting;
use Illuminate\Http\Request;

class BusinessSettingController extends Controller
{
    public function webSetUpShow()
    {
        return view('business-setting.website-setup');
    }
    public function socialSetUpShow()
    {
        return view('business-setting.social-setup');
    }
    public function webSetUpStore(Request $request)
    {
        $params = $request->except('_token');
        foreach ($params as $key => $value) {
            if ($request->hasFile($key)) {
                $value = $request->$key->store('public');
            }
            BusinessSetting::updateOrCreate(
                ["type" => $key],
                ["type" => $key, "value" => $value],
            );
        }
        return back();
    }
    public function refererSetupShow(){
    return view('business-setting.refer-setup');
    }
}