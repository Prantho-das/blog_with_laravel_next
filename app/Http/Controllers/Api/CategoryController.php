<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Utils\CategoryUtility;

class CategoryController extends Controller
{
    public function getCategoryList()
    {
        $categories = Category::query()->where('status', 1);
        $categories = CategoryUtility::filter($categories);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'category list ',
            'data' => $categories,
        ]);
    }
    public function categoryDetails($slug)
    {
        $category = Category::where('slug', $slug)->where('status', 1)->firstOrFail();
        return response()->json([
        'success' => true,
            'status' => 200,
            'message' => 'category list ',
            'data' => $category,
        ]);
    }
    public function recursiveCategory()
    {
        $category = Category::with('children')->where('status', 1)->get();
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'category list',
            'data' => $category,
        ]);
    }
}