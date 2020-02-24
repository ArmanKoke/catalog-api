<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }

    public function store(Request $request): TagResource
    {
        $tag = Tag::firstOrNew(['slug' => $request->slug]);
        $tag->name = $request->name;
        $tag->save();

        return new TagResource($tag);
    }

    public function show(Tag $tag): TagResource
    {
        return new TagResource($tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->name = $request->name ?? $tag->name;
        $tag->slug = $request->slug ?? $tag->slug;
        $tag->save();

        return $tag;
    }

    public function detachFromItem(Request $request): Response
    {
        $tag = Tag::find($request->tag_id);
        $tag->items()->detach($request->item_id);

        return response('Detached', 204);
    }

    public function detachFromCategory(Request $request): Response
    {
        $tag = Tag::find($request->tag_id);
        $tag->categories()->detach($request->category_id);

        return response(null, 204);
    }

    public function destroy(Tag $tag): Response
    {
        $tag->items()->detach();
        $tag->categories()->detach();
        $tag->delete();

        return response(null, 204);
    }
}
