<?php

namespace App\Repositories\User;

use App\Interfaces\User\PostRepositoryInterface;
use App\Models\ApiUser;
use Illuminate\Http\JsonResponse;

class PostRepository implements PostRepositoryInterface
{
    public function create() {

        $email      = request('email');
        $firstName  = request('first_name');
        $lastName   = request('last_name');
        $avatar     = request('avatar');

        $user = ApiUser::create([
            'email'         => $email,
            'first_name'    => $firstName,
            'last_name'     => $lastName,
            'avatar'        => $avatar,
        ]);
        
        $user->save();

        return response()->json([
            'status' => JsonResponse::HTTP_CREATED,
            'user'   => $user,
        ]);
    }
}
