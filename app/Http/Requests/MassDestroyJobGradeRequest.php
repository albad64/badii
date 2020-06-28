<?php

namespace App\Http\Requests;

use App\JobGrade;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJobGradeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('job_grade_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:job_grades,id',
        ];
    }
}
