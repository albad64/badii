<?php

namespace App\Http\Requests;

use App\Education;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateEducationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('education_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'order_number'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'graduated_year'  => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'education_level' => [
                'required',
            ],
        ];
    }
}
