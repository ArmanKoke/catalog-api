<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Helpers\SlugHelper;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
         return Category::all();
    }

    public function store(CategoryRequest $request):CategoryResource
    {
        $category = Category::firstOrNew(['name' => $request->name]);
        $category->slug = SlugHelper::makeSlug($request->name);
        $category->save();

        return new CategoryResource($category);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category->load('items'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all()); //todo add some permission for changing slug
        $category->save();

        return $category;
    }

    public function destroy(Category $category): Response
    {
        $category->items()->detach();
        $category->tags()->detach();
        $category->delete();

        return response(null, 204);
    }
}
