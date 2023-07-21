<?php

namespace App\Services\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;

class GetPostsService
{
    public function __construct(public PostRepository $postRepository) {}

    public function getAllPosts(): Collection {
        return $this->postRepository->getAllPosts();
    }

    public function getTrashPosts(): Collection {
        return $this->postRepository->getTrashPosts();
    }

    public function getDraftPosts(): Collection {
        return $this->postRepository->getDraftPosts();
    }
}
