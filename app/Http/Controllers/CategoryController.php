<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
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

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');
        }

        Category::create([
            'name' => $request->name,
            'slug' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'status' => $request->status == 'on' ? 1 : 0,
            'parent_id' => $request->parent_id ?? 0,
            'order' => $request->order ?? 0,
        ]);
        flash_message('Category Created', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $imageName = $category->image;
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');
            Storage::delete($category->image);
        }
        $category->update([
            'name' => $request->name,
            'slug' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'status' => $request->status == 'on' ? 1 : 0,
            'parent_id' => $request->parent_id ?? 0,
            'order' => $request->order ?? 0,
        ]);

        flash_message('Category Created', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category) {
            $category->delete();
        }
        return back();
    }
}