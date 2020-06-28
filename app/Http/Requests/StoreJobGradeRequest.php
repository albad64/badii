<?php

namespace App\Http\Requests;

use App\JobGrade;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreJobGradeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('job_grade_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'job_grade_name'      => [
                'required',
                'unique:job_grades',
            ],
            'organizational_area' => [
                'required',
            ],
            'job_level'           => [
                'required',
            ],
        ];
    }
}
