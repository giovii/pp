<?php

namespace App\Http\Requests;

use App\Models\ManualBonu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateManualBonuRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('manual_bonu_edit'),
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
            'value' => [
                'numeric',
                'nullable',
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }
}
