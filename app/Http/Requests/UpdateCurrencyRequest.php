<?php

namespace App\Http\Requests;

use App\Currency;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('currency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code'           => [
                'max:3',
                'required',
                'unique:currencies,code,' . request()->route('currency')->id,
            ],
            'description'    => [
                'max:36',
                'required',
            ],
            'symbol'         => [
                'required',
            ],
            'order_number'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'decimal_digits' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
