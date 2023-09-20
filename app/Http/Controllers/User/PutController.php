<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\User\PutRepositoryInterface;

class PutController extends Controller
{
    private PutRepositoryInterface $putRepository;

    public function __construct(PutRepositoryInterface $putRepository)
    {
        $this->putRepository = $putRepository;
    }


    public function update(int $userId) 
    {
        $response = $this->putRepository->update($userId);
        return [
            'status'    => $response->getData()->status,
            'user'      => $response->getData()->user,
        ];
    }
}
