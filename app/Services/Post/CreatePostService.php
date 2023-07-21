<?php

namespace App\Services\Post;

use App\Repositories\Interfaces\IPostRepository;

class CreatePostService
{
    public function __construct(public IPostRepository $postRepository) {}

    public function create(array $post): bool {
        return $this->postRepository->createPost($post);
    }
}
