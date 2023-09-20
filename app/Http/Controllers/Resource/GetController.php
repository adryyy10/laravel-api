<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Interfaces\Resource\GetRepositoryInterface;

class GetController extends Controller
{
    private GetRepositoryInterface $getRepository;

    public function __construct(GetRepositoryInterface $getRepository)
    {
        $this->getRepository = $getRepository;
    }

    public function get(int $id): array
    {
        return $this->getRepository->find($id);
    }

}
