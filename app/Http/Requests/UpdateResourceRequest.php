<?php

namespace App\Http\Requests;

use App\Resource;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateResourceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('resource_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'resource_code'    => [
                'required',
                'unique:resources,resource_code,' . request()->route('resource')->id,
            ],
            'hired_date'       => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'termination_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'status'           => [
                'required',
            ],
            'birth_date'       => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
