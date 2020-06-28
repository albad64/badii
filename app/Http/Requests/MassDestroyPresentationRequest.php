<?php

namespace App\Http\Requests;

use App\Presentation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPresentationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('presentation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:presentations,id',
        ];
    }
}
