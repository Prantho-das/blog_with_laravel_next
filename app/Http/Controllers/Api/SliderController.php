<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
    public function getSlider()
    {
        $sliders = Slider::where('status', 1)->get();

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Slider List',
            'data' => $sliders,
        ]);
    }
}