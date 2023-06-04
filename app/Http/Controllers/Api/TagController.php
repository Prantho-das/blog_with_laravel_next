<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;

class TagController extends Controller
{
    public function getTagList()
    {
        $tags = Tag::all();
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'tag list ',
            'data' => $tags,
        ]);
    }
    public function tagDetails($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $posts = Post::latest()->where('status', 1)->whereNotNull('approved_at')->whereJsonContains('tags', $tag->id)->paginate(10);
        $tag->posts = $posts;
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'tag list ',
            'data' => $tag,
        ]);
    }
}
