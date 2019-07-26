<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }
    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => auth()->user()->id
        ]);
        return redirect()->route('post.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        dd($post->toArray());
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $post = Post::findOrfail($id);
        return view('post.edit' , compact('post'));
    }
    public function update($id, Request $request)
    {
        Post::where('id', $id)->update([
            'title' =>$request->title,
            'description' =>$request->description,
            'author_id' => auth()->user()->id,
            
        ]);
        return redirect()->route('post.index');
    }

}
