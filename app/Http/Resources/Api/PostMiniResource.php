<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostMiniResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return $this->collection->map(function ($value) {
            return [
                "title" => $value->title,
                "slug" => $value->slug,
                "short_description" => $value->short_description,
                "image" => asset('storage/' . $value->image),
                "published_at" => Carbon::parse($value->created_at)->diffForHumans(),
            ];
        });
    }public function with(Request $request)
    {
        return [
            'status'=>200,
            'result'=>true
        ];
    }
}