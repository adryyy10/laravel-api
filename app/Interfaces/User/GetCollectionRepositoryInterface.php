<?php

namespace App\Interfaces\User;

use Illuminate\Database\Eloquent\Collection;

interface GetCollectionRepositoryInterface
{

    public function findAll(): Collection;

}
