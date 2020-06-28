<?php

namespace App\Http\Requests;

use App\Holiday;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreHolidayRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('holiday_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'resource_code_id' => [
                'required',
                'integer',
            ],
            'holidays_type'    => [
                'required',
            ],
            'holiday_year'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'holiday_month'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status'           => [
                'required',
            ],
        ];
    }
}
