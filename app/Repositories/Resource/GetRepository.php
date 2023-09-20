<?php

namespace App\Repositories\Resource;

use App\Interfaces\Resource\GetRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GetRepository implements GetRepositoryInterface
{

    public function find($id)
    {
        $resource = DB::select('select * from resources where id = ?', [$id]);
        
        if (empty($resource)) {
            throw new NotFoundHttpException('Resource not found');
        }

        return $resource;
    }

}
