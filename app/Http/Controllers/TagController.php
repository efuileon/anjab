<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tag; //<--Jangan sampai lupa nambahin use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('latihan.ajax')->with('tags',$tags);
    }

    public function store(Request $request)
    {
        $tag = Tag::create($request->input());
        return response()->json($tag);
    }

    public function edit($tag_id)
    {
        $tag = Tag::find($tag_id);
        return response()->json($tag);
    }

    public function update(Request $request,$tag_id)
    {
        $tag = Tag::find($tag_id);
        $tag->tagname = $request->tagname;
        $tag->slug = $request->slug;
        $tag->save();
        return response()->json($tag);
    }

    public function destroy($tag_id)
    {
        $tag = Tag::destroy($tag_id);
        return response()->json($tag);

    }
}
