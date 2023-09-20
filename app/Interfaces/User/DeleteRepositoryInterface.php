<?php

namespace App\Interfaces\User;

interface DeleteRepositoryInterface
{
    public function delete(int $userId);
}
