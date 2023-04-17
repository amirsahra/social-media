<?php

namespace App\Http\Controllers\V1\Auth\ActionClasses;

use App\Models\ResetCodePassword;

class CreateResetCodeAction
{
    public function __invoke(string $userMail): ResetCodePassword
    {
        $resetCode = new ResetCodePassword();
        $resetCode->email = $userMail;
        $resetCode->code = $this->generateRandomCode();
        $resetCode->save();
        return $resetCode;
    }

    private function generateRandomCode(): string
    {
        return mt_rand(100000, 999999);
    }
}
