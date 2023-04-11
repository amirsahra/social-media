<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\V1\Auth\ActionClasses\CreateUserAction;
use App\Http\Requests\V1\Auth\RegisterRequest;
use App\Http\Resources\User\InfoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $userAction = new CreateUserAction();
        $user = $userAction($request->only(['username', 'password', 'email']));

        return Response::apiResult('Registration has been successfully completed.',
            ['user' => new InfoResource($user)],
        );
    }
}
