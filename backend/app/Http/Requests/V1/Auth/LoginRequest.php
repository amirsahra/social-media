<?php

namespace App\Http\Requests\V1\Auth;

use App\Http\Requests\V1\ActionClasses\MatchLoginFieldAction;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $username
 * @property string $email
 * @property string $password
 */
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required'],
            'password' => ['required'],
        ];
    }

    /**
     * This method is for checking that username/email and password match.
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            if ($validator->failed()) return;

            $checkEmailAndPasswordMatch = new MatchLoginFieldAction();
            $attemptResult = $checkEmailAndPasswordMatch($this->input(
                'username'),
                $this->input('password')
            );

            if (!$attemptResult) {
                $validator->errors()
                    ->add('email', 'Email does not match password.');
            }
        });
    }
}
