<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\IPostRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements IPostRepository
{
    public function __construct(protected Post $post)
    {
    }

    public function getAllPosts(): Collection
    {
        return Post::orderBy('created_at', 'asc')->get();
    }

    public function getTrashPosts(): Collection
    {
        return Post::onlyTrashed()->get();
    }

    public function getDraftPosts(): Collection
    {
        return Post::where("status", false)->get();
    }

    public function createPost(array $post): bool
    {
        try {
            Post::create($post);
            return true;
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function updatePost(array $edited_post, Post $post): bool
    {
        try {
            $post->update($edited_post);
            return true;
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function deletePost(Post $post): bool
    {
        try {
            $post->delete();
            return true;
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function forceDeletePost(int $post_id): bool
    {
        try {
            Post::onlyTrashed()->find($post_id)->forceDelete();
            return true;
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function restorePost(int $post_id): bool
    {
        try {
            Post::onlyTrashed()->find($post_id)->restore();
            return true;
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }
}
