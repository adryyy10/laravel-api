<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\User\PostRepositoryInterface;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create() {

        $response = $this->postRepository->create();
        return [
            'status'    => $response->getData()->status,
            'user'      => $response->getData()->user,
        ];
    }
}
