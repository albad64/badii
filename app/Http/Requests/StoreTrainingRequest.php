<?php

namespace App\Http\Requests;

use App\Training;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTrainingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('training_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'training_year'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
