<?php

namespace App\Repositories\User;

use App\Interfaces\User\PutRepositoryInterface;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PutRepository implements PutRepositoryInterface
{
    public function update(int $userId): JsonResponse
    {
        $email      = request('email');
        $firstName  = request('first_name');
        $lastName   = request('last_name');
        $avatar     = request('avatar');

        $user = User::find($userId);

        // Return if user not found
        if (empty($user)) {
            throw new NotFoundHttpException('User not found');
        }

        $user->email        = $email;
        $user->first_name   = $firstName;
        $user->last_name    = $lastName;
        $user->avatar       = $avatar;
        
        $user->save();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'user'   => $user,
        ]);
    }
}
