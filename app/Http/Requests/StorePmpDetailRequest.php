<?php

namespace App\Http\Requests;

use App\PmpDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePmpDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pmp_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'number_detail' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
