<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::latest()->paginate(15);
        return view('page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banner = null;
        if ($request->hasFile('banner')) {
            $banner = $request->banner->store('public');
        }
        Page::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '_') . time(),
            'banner' => $banner,
            'description' => $request->description ?? '',
            'link' => $request->link,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $banner = $page->banner;
        if ($request->hasFile('banner')) {
            $banner = $request->banner->store('public');
        }
        $page->update([
            'title' => $request->title,
            'banner' => $banner,
            'description' => $request->description ?? '',
            'link' => $request->link,

        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        if ($page) {
            $page->delete();
        }
        return back();
    }
}