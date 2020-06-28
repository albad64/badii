<?php

namespace App\Http\Requests;

use App\CompaniesBankHoliday;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCompaniesBankHolidayRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('companies_bank_holiday_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:companies_bank_holidays,id',
        ];
    }
}
