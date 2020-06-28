<?php

namespace App\Http\Requests;

use App\Salary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSalaryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('salary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'start_date'               => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'week_working_string'      => [
                'min:7',
                'max:7',
            ],
            'staffing_agency_end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'nca_end_date'             => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'expected_next_lsb_date'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
