<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\User\GetRepositoryInterface;

class GetController extends Controller
{
    private GetRepositoryInterface $getRepository;

    public function __construct(GetRepositoryInterface $getRepository)
    {
        $this->getRepository = $getRepository;
    }

    public function get(int $id): array
    {
        $response = $this->getRepository->find($id);

        return [
            'status'    => $response->getData()->status,
            'user'      => $response->getData()->user,
        ];
    }

}
