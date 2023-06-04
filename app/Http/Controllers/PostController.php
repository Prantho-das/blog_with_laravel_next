<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("post.create", compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $meta = [
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ];
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');
        }
        $location = [
            "division" => $request->division,
            "zilla" => $request->zilla,
            "upazilla" => $request->upzilla,
        ];
        Post::create([
            "title" => $request->title,
            "slug" => Str::slug($request->title, '_') . time(),
            "category_id" => $request->category_id,
            "tags" => json_encode($request->tags),
            "short_description" => $request->short_description,
            "location" => json_encode($location),
            "status" => $request->status == 'on' ? 1 : 0,
        "meta" => json_encode($meta),
            "description" => $request->description,
            "image" => $imageName,
            "author_id" => auth()->id(),
            "post_type" => $request->post_type,
            "reading_given_point" => $request->reading_given_point,
            "premium_content" => $request->premium_content == 'on' ? 1 : 0,
            "reading_want_point" => $request->reading_want_point,
        ]);
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("post.edit", compact('tags', 'categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $meta = [
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ];
        $imageName = $post->image;
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');
        }
        $location = [
            "division" => $request->division,
            "zilla" => $request->zilla,
            "upazilla" => $request->upzilla,
        ];
        $post->update([
            "title" => $request->title,
            "category_id" => $request->category_id,
            "tags" => json_encode($request->tags),
            "short_description" => $request->short_description,
            "location" => json_encode($location),
            "status" => $request->status == 'on' ? 1 : 0,
            "meta" => json_encode($meta),
            "description" => $request->description,
            "image" => $imageName,
            "order" => $request->order,
            "post_type" => $request->post_type,
            "reading_given_point" => $request->reading_given_point,
            "premium_content" => $request->premium_content == 'on' ? 1 : 0,
            "reading_want_point" => $request->reading_want_point,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post) {
            $post->delete();
        }
        return back();
    }

    public function approvePost(Post $post)
    {
        $post->update([
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);
        return back();
    }
}