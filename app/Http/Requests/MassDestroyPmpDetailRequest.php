<?php

namespace App\Http\Requests;

use App\PmpDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPmpDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pmp_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pmp_details,id',
        ];
    }
}
