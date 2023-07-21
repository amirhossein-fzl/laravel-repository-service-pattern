<?php

namespace App\Services\Post;
use App\Models\Post;
use App\Repositories\PostRepository;

class DeletePostService
{
    public function __construct(public PostRepository $postRepository) {}

    public function delete(Post $post): bool {
        return $this->postRepository->deletePost($post);
    }

    public function forceDelete(int $post_id): bool {
        return $this->postRepository->forceDeletePost($post_id);
    }
}
