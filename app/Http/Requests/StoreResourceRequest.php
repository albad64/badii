<?php

namespace App\Http\Requests;

use App\Resource;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreResourceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('resource_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'resource_code'    => [
                'min:3',
                'max:5',
                'required',
                'unique:resources',
            ],
            'hired_date'       => [
                'required',
                'date_format:' . config('panel.date_format'),
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
            'work_email'       => [
                'required',
            ],
        ];
    }
}
