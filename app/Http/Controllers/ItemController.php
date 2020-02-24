<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemDetachFromCategoryRequest;
use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission')->except(['index', 'show']); //or better use it in routes but have to create routes manually
    }

    public function index()
    {
        return Item::all();
    }

    public function store(ItemRequest $request)
    {
        $item = Item::firstOrNew(['name' => $request->name]);
        $item->price = $request->price;
        $item->weight = $request->weight;
        $item->color = $request->color;
        $item->save();

        $item->categories()->attach($request->category_id);

        return new ItemResource($item);
    }

    public function show(Item $item)
    {
        return new ItemResource($item->load('categories'));
    }

    public function update(Request $request, Item $item)
    {
        $item->name = $request->name ?? $item->name;
        $item->price = $request->price ?? $item->price;
        $item->weight = $request->weight;
        $item->color = $request->color;
        $item->save();

        $item->categories()->attach($request->category_id);

        return $item->load('categories');
    }

    public function detachFromCategory(ItemDetachFromCategoryRequest $request)
    {
        $item = Item::find($request->item_id);
        $item->categories()->detach($request->category_id);

        return $item->load('categories');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response(null, 204);
    }
}
