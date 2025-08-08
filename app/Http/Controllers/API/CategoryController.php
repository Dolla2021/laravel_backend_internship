<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Category;
class CategoryController extends Controller
{
    // GET /api/categories
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json($category);
    }
}