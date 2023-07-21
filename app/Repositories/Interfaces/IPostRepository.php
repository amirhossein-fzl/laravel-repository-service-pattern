<?php

namespace App\Repositories\Interfaces;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface IPostRepository {
    public function getAllPosts(): Collection;
    public function getTrashPosts(): Collection;
    public function getDraftPosts(): Collection;
    public function createPost(array $post): bool;
    public function updatePost(array $edited_post, Post $post): bool;
    public function deletePost(Post $post): bool;
    public function forceDeletePost(int $post_id): bool;
    public function restorePost(int $post_id): bool;
}

