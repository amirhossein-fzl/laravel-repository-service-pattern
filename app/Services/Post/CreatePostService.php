<?php

namespace App\Services\Post;
use App\Repositories\PostRepository;

class CreatePostService
{
    public function __construct(public PostRepository $postRepository) {}

    public function create(array $post): bool {
        return $this->postRepository->createPost($post);
    }
}
