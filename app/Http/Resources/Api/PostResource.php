<?php

namespace App\Http\Resources\Api;

use App\Models\Tag;
use App\Models\User;
use App\Models\UserBuyPost;
use App\Models\UserReadPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class PostResource extends JsonResource
{

    protected $userInfo = null;

    protected function descriptionFilter($post)
    {
        if ($post->premium_content == 1) {
            if (request()->bearerToken()) {

                if (!$this->userInfo) {
                    return false;
                }
                $user_buy_post = UserBuyPost::where('post_id', $post->id)->where('user_id', $this->userInfo->id)->first();
                if (!$user_buy_post) {
                    $post->description = null;
                }
            } else {
                $post->description = null;
            }
        }
        return $post->description;
    }
    protected function tagInfo($tags)
    {
        if ($tags) {
            $tags = json_decode($tags) ?? [];
            return Tag::whereIn('id', $tags)->select('id', 'name')->get();
        }
        return null;
    }

    protected function postBuyStatus($post)
    {
        if (request()->bearerToken()) {
            if (!$this->userInfo) {
                return false;
            }
            $user_buy_post = UserBuyPost::where('post_id', $post->id)->where('user_id', $this->userInfo->id)->first();
            if (!$user_buy_post) {
                return false;
            }
        } else {
            return false;
        }
        return true;
    }
    protected function userReadStatus($post)
    {
        if (request()->bearerToken()) {
            $userRead=UserReadPost::where('post_id',$post->id)->where('user_id',$this->userInfo->id)->first();
            if($userRead){
                return true;
            }
        }
        return false;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request)
    {
        $this->userInfo = getUserByToken();
        return [
            "title" => $this->title,
            "slug" => $this->slug,
            "short_description" => $this->short_description,
            "description" => $this->descriptionFilter($this),
            "image" => asset('storage/' . $this->image),
            "view_count" => $this->view_count,
            "like_count" => $this->like_count,
            "dislike_count" => $this->dislike_count,
            "published_at" => Carbon::parse($this->created_at)->diffForHumans(),
            "post_type" => $this->post_type,
            "location" => "",
            "meta" => json_decode($this->meta) ?? [],
            "tags" => $this->tagInfo($this->tags),
            "reading_given_point" => $this->reading_given_point,
            "premium_content" => $this->premium_content,
            "reading_want_point" => $this->reading_want_point,
            "post_buy_status" => $this->premium_content == 1 ? $this->postBuyStatus($this) : true,
            "category" => $this->category->name ?? "",
            "author" => $this->user->name ??"",
            "user_read_status" => $this->userReadStatus($this),
        ];
    }
    public function with(Request $request)
    {
        return [
            'status' => 200,
            'result' => true,
        ];
    }
}
