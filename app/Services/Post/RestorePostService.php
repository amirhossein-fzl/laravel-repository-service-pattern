<?php

namespace App\Services\Post;
use App\Repositories\PostRepository;

class RestorePostService
{
    public function __construct(public PostRepository $postRepository) {}

    public function restore(int $post_id): bool {
        return $this->postRepository->restorePost($post_id);
    }
}
