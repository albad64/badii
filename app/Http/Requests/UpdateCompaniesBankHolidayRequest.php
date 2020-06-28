<?php

namespace App\Http\Requests;

use App\CompaniesBankHoliday;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCompaniesBankHolidayRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('companies_bank_holiday_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'company_id'        => [
                'required',
                'integer',
            ],
            'year'              => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'bank_holiday_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
