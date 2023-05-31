<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $posts = new Post;
        $posts->title = $request->title;
        $posts->description = $request->description;

        $posts->save();

        return $posts;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Post::findOrFail( $id );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Post::findOrFail( $id );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $posts = Post::findOrFail( $id );

        $posts->update( [
            'title'       => $request->title,
            'description' => $request->description,
        ] );

        return response()->json( ['message' => 'Successfully updated Post', $posts], 200 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posts = Post::findOrFail( $id );
        $posts->delete();
        return response()->json( ['message' => 'Successfully deleted Post'], 202 );
    }
}
