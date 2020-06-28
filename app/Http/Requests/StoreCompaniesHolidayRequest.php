<?php

namespace App\Http\Requests;

use App\CompaniesHoliday;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCompaniesHolidayRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('companies_holiday_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'company_id' => [
                'required',
                'integer',
            ],
            'level'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'seniority'  => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
