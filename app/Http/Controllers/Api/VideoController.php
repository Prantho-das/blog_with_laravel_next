<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function getVideos()
    {
        $videos = Video::query();
        if (request()->has('limit') && !is_null(request()->limit)) {
            $videos = $videos->limit(request()->limit);
        }
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Video List',
            'data' => $videos->get(),
        ]);
    }
    public function getVideoDetails($id)
    {
        $video = Video::findOrFail($id);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Video Found',
            'data' => $video,
        ]);
    }
}