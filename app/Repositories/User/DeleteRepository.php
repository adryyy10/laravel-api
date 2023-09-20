<?php

namespace App\Repositories\User;

use App\Interfaces\User\DeleteRepositoryInterface;
use App\Models\ApiUser;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteRepository implements DeleteRepositoryInterface
{
    public function delete(int $userId): JsonResponse
    {
        $user = ApiUser::find($userId);
        
        if (empty($user)) {
            throw new NotFoundHttpException('User not found');
        }

        $user->delete();

        return response()->json([
            'status' => JsonResponse::HTTP_NO_CONTENT,
        ]);
    }
}
