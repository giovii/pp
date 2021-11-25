<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('user_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'surname' => [
                'string',
                'required',
            ],
            'email' => [
                'email:rfc',
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'password' => [
                'string',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'locale' => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'string',
                'min:10',
                'max:13',
                'required',
                'unique:users,phone_number,' . request()->route('user')->id,
            ],
            'investor_type' => [
                'nullable',
                'in:' . implode(',', array_keys(User::INVESTOR_TYPE_SELECT)),
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'zip_code' => [
                'string',
                'nullable',
            ],
            'vat' => [
                'string',
                'nullable',
            ],
            'referrer' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'referred_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'refcode' => [
                'string',
                'nullable',
            ],
        ];
    }
}
