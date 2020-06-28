<?php

namespace App\Http\Requests;

use App\HouseHold;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreHouseHoldRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('house_hold_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'resource_code_id'  => [
                'required',
                'integer',
            ],
            'prog'              => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'relationship_type' => [
                'required',
            ],
        ];
    }
}
