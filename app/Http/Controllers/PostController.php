<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    function index() {
        return response()->json(Post::all(), 200);
    }

    function show(Post $post) {
        return response()->json($post, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post = new Post;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->uuid = \Str::uuid();
        $post->save();

        $data = [
            'status' => 'success',
            'message' => 'Post created successfully',
            'data' => $post
        ];
        return response()->json($data, 201);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post->content = $request->content;
        $post->save();

        $data = [
            'status' => 'success',
            'message' => 'Post updated successfully',
            'data' => $post
        ];
        return response()->json($data, 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        $data = [
            'status' => 'success',
            'message' => 'Post deleted successfully',
        ];
        return response()->json($data, 200);
    }
}
