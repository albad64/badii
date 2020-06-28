<?php

namespace App\Http\Requests;

use App\JobExperience;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreJobExperienceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('job_experience_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'resource_code_id' => [
                'required',
                'integer',
            ],
            'order_number'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'company_name'     => [
                'required',
            ],
            'job_start_date'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'job_end_date'     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
