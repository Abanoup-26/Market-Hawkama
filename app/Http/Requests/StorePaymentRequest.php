<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'project_id' => [
                'required',
                'integer',
            ],
            'payment_orderid' => [
                'string',
                'nullable',
            ],
            'donation_num' => [
                'string',
                'nullable',
            ],
            'donation' => [
                'required',
            ],
            'payment_type' => [
                'required',
            ],
        ];
    }
}
