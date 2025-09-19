<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    public function search(Request $request)
    {
        $searched = Post::search($request->get('query'))->get();

        return response()->json([
            'status' => true,
            'message' => 'searched successfully',
            'data' => $searched
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate();
        return response()->json([
            'status' => true,
            'message' => 'fetched posts successfully',
            'data' => $posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        Gate::authorize('create', Post::class);

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;

        Post::create($data);
        return response()->json([
            'status' => true,
            'message' => 'post created successfully',
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json([
            'status' => true,
            'message' => 'fetched single post successfully',
            'data' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);

        $post->update($request->validated());
        return response()->json([
            'status' => true,
            'message' => 'post updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        $post->delete();
        return response()->json([
            'status' => true,
            'message' => 'post deleted successfully',
        ], Response::HTTP_NO_CONTENT);
    }
}
