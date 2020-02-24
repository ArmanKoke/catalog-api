<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission')->except(['index', 'show']); //or better use it in routes but have to create routes manually
    }

    public function index()
    {
         return Category::all();
    }

    public function store(CategoryRequest $request):CategoryResource
    {
        $category = Category::firstOrNew(['name' => $request->name]);
        $category->save();

        return new CategoryResource($category);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category->load('items'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();

        return $category;
    }

    public function destroy(Category $category)
    {
        $category->items()->detach();
        $category->delete();

        return response(null, 204);
    }
}
