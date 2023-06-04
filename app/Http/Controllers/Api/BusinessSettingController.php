<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use Illuminate\Http\Request;

class BusinessSettingController extends Controller
{
    public function getSetting(){
        $settings=BusinessSetting::select('type','value')->get();
        return response()->json([
        'success' => true,
        'status' => 200,
        'message' => 'setting list',
        'data'=>$settings
        ]);
    }
}