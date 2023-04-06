<?php

namespace App\Http\Requests\V1\ActionClasses;

class MatchLoginFieldAction
{
    /**
     * It checks that the login and password fields match, that is,
     * they are for the same user
     */
    public function __invoke(string $loginField, string $password): bool
    {
        $getLoginField = new LoginFieldAction();
        $loginFieldType = $getLoginField($loginField);
        return auth()->attempt([
            $loginFieldType => $loginField,
            'password' => $password
        ]);
    }
}


