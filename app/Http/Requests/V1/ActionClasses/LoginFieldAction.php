<?php

namespace App\Http\Requests\V1\ActionClasses;

class LoginFieldAction
{
    /**
     * It checks whether the input is an email or not,if it is not an email,
     * then it is considered as a username.
     */
    public function __invoke(string $loginField): string
    {
        return filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    }

}
