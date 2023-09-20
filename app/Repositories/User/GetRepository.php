<?php

namespace App\Repositories\User;

use App\Interfaces\User\GetRepositoryInterface;
use App\Models\ApiUser;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GetRepository implements GetRepositoryInterface
{

    public function find($id)
    {
        $user = ApiUser::find($id);
        
        if (empty($user)) {
            throw new NotFoundHttpException('User not found');
        }

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'user'   => $user,
        ]);
    }

}
