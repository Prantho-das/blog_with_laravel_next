<?php

namespace App\Utils;

use Illuminate\Http\Request;

class PostUtility
{
    public static function postFilter($posts)
    {
        if (request()->has('author_id') && !is_null(request()->author_id)) {
            $posts->where('author_id', request()->author_id);
        }
        if (request()->has('category_id') && !is_null(request()->category_id)) {
            $posts->where('category_id', request()->category_id);
        }
        if (request()->has('post_type') && !is_null(request()->post_type)) {
            $posts->where('post_type', request()->post_type);
        }
        if (request()->has('tag_id') && !is_null(request()->tag_id)) {
            $posts->whereJsonContains('tags', request()->tag_id);
        }
        if (request()->has('zilla_id') && !is_null(request()->zilla_id)) {
            $posts->whereJsonContains('location->zilla', request()->zilla_id);
        }
        if (request()->has('division_id') && !is_null(request()->division_id)) {
            $posts->whereJsonContains('location->division', request()->division_id);
        }
        if (request()->has('upzilla_id') && !is_null(request()->upzilla_id)) {
            $posts->whereJsonContains('location->upzilla', request()->upzilla_id);
        }
        if (request()->has('liked') && !is_null(request()->liked)) {
            $posts->orderBy('like_count',request()->liked);
        }
        if (request()->has('disliked') && !is_null(request()->disliked)) {
            $posts->orderBy('dislike_count',request()->disliked);
        }
        if (request()->has('most_read') && !is_null(request()->most_read)) {
            $posts->orderBy('view_count','desc');
        }
        if (request()->has('limit') && !is_null(request()->limit)) {
            $posts=$posts->paginate(request()->limit);
        }else{
           $posts= $posts->paginate();
        }

        return $posts;
    }
}