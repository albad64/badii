<?php

namespace App\Http\Requests;

use App\HouseHold;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHouseHoldRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('house_hold_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:house_holds,id',
        ];
    }
}
