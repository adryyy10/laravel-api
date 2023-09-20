<?php

namespace App\Repositories\User;

use App\Interfaces\User\GetCollectionRepositoryInterface;
use App\Models\ApiUser;
use Illuminate\Database\Eloquent\Collection;

class GetCollectionRepository implements GetCollectionRepositoryInterface
{

    public function findAll(): Collection
    {
        return ApiUser::all();
    }

}
