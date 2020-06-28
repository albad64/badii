<?php

namespace App\Http\Requests;

use App\Benefit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreBenefitRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('benefit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
<<<<<<< HEAD
            'resource_code_id'   => [
                'required',
                'integer',
            ],
            'benefit_extra_type' => [
                'required',
            ],
            'benefit_type'       => [
                'required',
            ],
            'assigned_date'      => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'expired_date'       => [
=======
            'resource_code_id' => [
                'required',
                'integer',
            ],
            'assigned_date'    => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'expired_date'     => [
>>>>>>> quickadminpanel_2020_06_28_07_35_51
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
