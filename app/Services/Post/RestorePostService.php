<?php

namespace App\Services\Post;

use App\Repositories\Interfaces\IPostRepository;

class RestorePostService
{
    public function __construct(public IPostRepository $postRepository) {}

    public function restore(int $post_id): bool {
        return $this->postRepository->restorePost($post_id);
    }
}
