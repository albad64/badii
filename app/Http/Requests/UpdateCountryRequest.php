<?php

namespace App\Http\Requests;

use App\Country;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCountryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('country_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'       => [
                'min:1',
                'max:50',
                'required',
                'unique:countries,name,' . request()->route('country')->id,
            ],
            'short_code' => [
                'required',
            ],
        ];
    }
}
