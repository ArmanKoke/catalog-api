<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemDetachFromCategoryRequest;
use App\Http\Requests\ItemFilterRequest;
use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemFilterResource;
use App\Http\Resources\ItemResource;
use App\Item;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function store(ItemRequest $request): ItemResource
    {
        $item = Item::firstOrNew(['name' => $request->name]);
        $item->price = $request->price;
        $item->weight = $request->weight;
        $item->color = $request->color;
        $item->save();

        $item->categories()->attach($request->category_id);

        return new ItemResource($item);
    }

    public function show(Item $item): ItemResource
    {
        return new ItemResource($item->load('categories'));
    }

    public function filter(ItemFilterRequest $request): ItemFilterResource
    {
        $item = (new Item)->newQuery();

        if ($request->price) {
            $item->where('price', $request->price_operand, $request->price);
        }

        if ($request->weight) {
            $item->where('weight', $request->weight_operand, $request->weight);
        }

        if ($request->created_at) {
            $item->where('created_at', $request->created_at_operand, Carbon::parse($request->created_at));
        }

        if ($request->color) {
            $item->where('color', '=', $request->color);
        }

        //if more fields from tag needed group of fields can be organized like tag[slug] etc.
        if ($request->tag_slug) { //todo just for showcase same can be done for categories
            $item_ids_with_slug = Tag::select('item_tag.item_id')
                ->leftJoin('item_tag','tags.id','=','item_tag.tag_id')
                ->where('slug','=',$request->tag_slug)
                ->get()
                ->pluck('item_id')
                ->all();
            $item->whereIn('id', $item_ids_with_slug);
        }

        return new ItemFilterResource($item->get()->load('categories'));
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

    public function destroy(Item $item): Response
    {
        $item->categories()->detach();
        $item->tags()->detach();
        $item->delete();

        return response(null, 204);
    }
}
