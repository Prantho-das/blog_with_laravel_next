<?php

namespace App\Utils;

use Illuminate\Http\Request;

class CategoryUtility
{
    public static function filter($categories)
    {
        if (request()->has('ids') && !is_null(request()->ids)) {
            $categories->whereIn('category_id', explode(',',request()->ids));
        }
        if (request()->has('slug') && !is_null(request()->slug)) {
            $categories->where('slug', request()->slug);
        }
        if (request()->has('parent') && !is_null(request()->parent)) {
            $categories->where('parent_id',0);
        }
        if (request()->has('limit') && !is_null(request()->limit)) {
            $categories->limit(request()->limit);
        }
        $categories->orderBy('order', 'asc');

        return $categories->get();
    }
}