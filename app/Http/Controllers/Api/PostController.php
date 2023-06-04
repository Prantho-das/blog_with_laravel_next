<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PostMiniResource;
use App\Http\Resources\Api\PostResource;
use App\Models\Post;
use App\Models\User;
use App\Models\UserReadPost;
use App\Utils\PostUtility;

class PostController extends Controller
{
    public function postList()
    {
        $posts = Post::query()->latest()->where('status', 1)->whereNotNull('approved_at');
        $posts = PostUtility::postFilter($posts);
        return new PostMiniResource($posts);
    }

    public function postDetails($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 1)->whereNotNull('approved_at')->with('user', 'category')->firstOrFail();
        return new PostResource($post);
    }

    public function getPointByPost($postId)
    {
        if (auth()->check()) {
            $userInfo = auth()->user();
            $userRead = UserReadPost::where('post_id', $postId)->where('user_id', $userInfo->id)->first();
            
            $userCurrentPoint = $userInfo->point ??0;
            if (!$userRead) {
                $post = Post::findOrFail($postId);
                UserReadPost::create([
                    'post_id' => $postId,
                    'user_id' => $userInfo->id,
                ]);
                $userCurrentPoint = (int) $userCurrentPoint + (int) $post->reading_given_point;
                User::where('id',$userInfo->id)->update(['point'=>$userCurrentPoint]);
            }
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'post read done',
                'user_point' => $userCurrentPoint,
            ]);
        }
        return response()->json([
            'success' => false,
            'status' => 401,
            'message' => 'user not logged in',
            'user_point' => 0,
        ]);

    }
}