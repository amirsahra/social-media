<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ActionClasses\LoginFieldAction;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Resources\User\InfoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Auth;

class LoginController extends Controller
{
    /**
     * User can login with username or email along with password.In this method,
     * first validation is done in the requests and then it is checked whether
     * the username/email matches the password or not.If the user has sent
     * his information correctly, he will be logged in and a token will
     * be sent to the user's information.
     */
    public function login(LoginRequest $request):JsonResponse
    {
        $getLoginField = new LoginFieldAction();
        auth()->attempt([$getLoginField($request->username) => $request->username, 'password' => $request->password]);
        $user = auth()->user();

        $token = $user->createToken('authToken')->plainTextToken;

        return Response::apiResult('You have successfully logged in.',
            ['token' => $token, 'user' => new InfoResource($user)],
        );
    }

    public function logout(Request $request):JsonResponse
    {
        $request->user()->tokens()->delete();
        return Response::apiResult('Successfully logged out.');
    }
}
