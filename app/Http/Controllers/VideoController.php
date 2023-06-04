<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos=Video::latest()->paginate();
        return view('video.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Video::create([
            'title'=>$request->title,
            'youtube_embed_url'=>$request->youtube_embed_url,
            'link'=>$request->link
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('video.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $video->update([
            'title'=>$request->title,
            'youtube_embed_url'=>$request->youtube_embed_url,
            'link'=>$request->link
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        if($video){
            $video->delete();
        }
        return back();
    }
}