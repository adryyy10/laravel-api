<?php

namespace App\Repositories\Resource;

use App\Interfaces\Resource\GetCollectionRepositoryInterface;
use Illuminate\Support\Facades\DB;

class GetCollectionRepository implements GetCollectionRepositoryInterface
{

    public function findAll(): array
    {
        return DB::select('select * from resources');
    }

}
