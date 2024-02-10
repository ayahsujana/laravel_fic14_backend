<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get category
        $categories = Category::all();
        //return with message success and data categories
        return response()->json([
          'success' => true,
          'message' => 'List Data Category',
            'data' => $categories
        ], 200);

        // $categories = Category::all();
        // // return with message and data
        // return response()->json([
        //     'success' => true,
        //     'message' => 'List Data Category',
        //  'data' => $categories
        // ], 200);
    }


}
