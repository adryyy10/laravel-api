<?php

namespace App\Repositories\User;

use App\Interfaces\User\GetCollectionRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class GetCollectionRepository implements GetCollectionRepositoryInterface
{

    public function findAll(): Collection
    {
        return User::all();
    }

}
