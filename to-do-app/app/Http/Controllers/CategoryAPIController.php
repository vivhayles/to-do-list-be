<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryAPIController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->name = $request->input('name');

        $category->save();
        return response()->json([
            'message' => 'Category created successfully.',
            'success' => true,
        ], 201);
    }
}
