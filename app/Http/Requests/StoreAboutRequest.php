<?php

namespace App\Http\Requests;

use App\Models\About;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAboutRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('about_create');
    }

    public function rules()
    {
        return [
            'logo' => [
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'location' => [
                'string',
                'required',
            ],
            'whatsapp' => [
                'string',
                'required',
            ],
            'instagram' => [
                'string',
                'required',
            ],
            'twitter' => [
                'string',
                'required',
            ],
        ];
    }
}