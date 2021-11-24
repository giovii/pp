<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('product_edit'),
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
            'description' => [
                'string',
                'nullable',
            ],
            'category' => [
                'array',
            ],
            'category.*.id' => [
                'integer',
                'exists:product_categories,id',
            ],
            'location' => [
                'string',
                'nullable',
            ],
            'short_description' => [
                'string',
                'nullable',
            ],
            'opportunity_code' => [
                'string',
                'nullable',
            ],
            'maximum_target' => [
                'numeric',
                'nullable',
            ],
            'minimum_target' => [
                'numeric',
                'nullable',
            ],
            'roi' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'product.start_founding' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'product.end_founding' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'risk' => [
                'nullable',
                'in:' . implode(',', array_keys(Product::RISK_SELECT)),
            ],
            'product.repayment' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'manager_prepay_invest' => [
                'boolean',
            ],
            'prepay_invest' => [
                'boolean',
            ],
            'email_owner' => [
                'string',
                'nullable',
            ],
            'section' => [
                'string',
                'nullable',
            ],
            'financial_details' => [
                'string',
                'nullable',
            ],
            'state' => [
                'nullable',
                'in:' . implode(',', array_keys(Product::STATE_SELECT)),
            ],
            'bonus_multiplier' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
