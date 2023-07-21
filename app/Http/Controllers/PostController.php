<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Repositories\Interfaces\IPostRepository;
use App\Services\Post\CreatePostService;
use App\Services\Post\DeletePostService;
use App\Services\Post\GetPostsService;
use App\Services\Post\RestorePostService;
use App\Services\Post\UpdatePostService;

class PostController extends Controller
{
    public function __construct(protected IPostRepository $postRepo) {}
    /**
     * Display a listing of the resource.
     */
    public function index(GetPostsService $service)
    {
        $posts = $service->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, CreatePostService $servcie)
    {
        $result = $servcie->create($request->validated());

        if($result) {
            return response()->redirectTo(route("post.index"))->with("success:message", "Post created successfully!");
        }

        return response()->redirectTo(route("post.index"))->with("error:message", "Error in create post. call with admin!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post, UpdatePostService $service)
    {
        $result = $service->update($request->validated(), $post);

        if($result) {
            return response()->redirectTo(route("post.index"))->with("success:message", "Post updated successfully!");
        }

        return response()->redirectTo(route("post.index"))->with("error:message", "Error in update post. call with admin!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, DeletePostService $service)
    {
        $result = $service->delete($post);

        if($result) {
            return response()->redirectTo(route("post.index"))->with("success:message", "Post deleted successfully!");
        }

        return response()->redirectTo(route("post.index"))->with("error:message", "Error in delete post. call with admin!");
    }

    /**
     * restore deleted post from database
     *
     * @param Post $post
     * @return Response
     */
    public function restore(int $post_id, RestorePostService $service)
    {
        $result = $service->restore($post_id);

        if($result) {
            return response()->redirectTo(route("post.index"))->with("success:message", "Post restored successfully!");
        }

        return response()->redirectTo(route("post.index"))->with("error:message", "Error in restore post. call with admin!");
    }

    /**
     * Get Trashed posts page
     *
     * @return View
     */
    public function trash(GetPostsService $service) {
        $posts = $service->getTrashPosts();
        return view('posts.trash', compact('posts'));
    }

    public function forceDelete(int $post_id, DeletePostService $service) {
        $result = $service->forceDelete($post_id);

        if($result) {
            return response()->redirectTo(route("post.index"))->with("success:message", "Post force deleted successfully!");
        }

        return response()->redirectTo(route("post.index"))->with("error:message", "Error in force delete post. call with admin!");
    }
}
