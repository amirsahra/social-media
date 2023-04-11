<?php

namespace App\Http\Requests\V1;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Response;

class CustomFormRequest extends FormRequest
{
    protected function failedValidation(Validator $validator): mixed
    {
        throw new HttpResponseException(Response::apiResult(
            'Incorrect Details, Please try again.',
            ['errors' => $validator->errors()],
            false,
            422
        ));
    }

    protected function failedAuthorization(): mixed
    {
        throw new HttpResponseException(Response::apiResult(
            'This action is unauthorized.',
            ['authorization' => __('messages.unauthorized')],
            false,
            401
        ));
    }
}
