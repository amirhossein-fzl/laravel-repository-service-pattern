<?php

namespace App\Services\Post;
use App\Models\Post;
use App\Repositories\PostRepository;

class UpdatePostService
{
    public function __construct(public PostRepository $postRepository) {}

    public function update(array $edited_post, Post $post): bool {
        return $this->postRepository->updatePost($edited_post, $post);
    }
}
