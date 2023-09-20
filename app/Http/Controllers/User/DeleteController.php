<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\User\DeleteRepositoryInterface;

class DeleteController extends Controller
{
    private DeleteRepositoryInterface $deleteRepository;

    public function __construct(DeleteRepositoryInterface $deleteRepository)
    {
        $this->deleteRepository = $deleteRepository;
    }

    public function delete(int $userId) {
        $response = $this->deleteRepository->delete($userId);

        return [
            'status'    => $response->getData()->status,
        ];
    }
}
