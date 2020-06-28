<?php

namespace App\Http\Requests;

use App\Pmp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePmpRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pmp_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'resource_code_id'          => [
                'required',
                'integer',
            ],
            'pmp_year'                  => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'current_grade_id'          => [
                'required',
                'integer',
            ],
            'expected_grade_id'         => [
                'required',
                'integer',
            ],
            'objective_mid_review_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'objective_end_eval_date'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
