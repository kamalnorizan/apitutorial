<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $data = [
            'status' => 'success',
            'message' => 'Posts retrieved successfully',
            'data' => $posts
        ];
        return response()->json($data, 200);
    }

    public function show(Post $post)
    {
        $data = [
            'status' => 'success',
            'message' => 'Post retrieved successfully',
            'data' => $post
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $inputData = [
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'uuid'    => \Str::uuid()
        ];

        $post = Post::create($inputData);

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
            'data' => $post
        ];
        return response()->json($data, 200);
    }
}
