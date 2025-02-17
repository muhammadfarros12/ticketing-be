<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index() {
        $categories = Category::orderBy('id', 'ASC')->get();
        return response()->json([
            'status' => 'success',
            'data' => $categories
        ], 200);
    }
}
