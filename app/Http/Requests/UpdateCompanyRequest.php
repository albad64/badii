<?php

namespace App\Http\Requests;

use App\Company;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'company'             => [
                'min:1',
                'max:20',
                'required',
                'unique:companies,company,' . request()->route('company')->id,
            ],
            'company_name'        => [
                'required',
            ],
            'currency_id'         => [
                'required',
                'integer',
            ],
            'invoice_prefix'      => [
                'required',
            ],
            'project_prefix'      => [
                'required',
            ],
            'legal_working_hours' => [
                'required',
            ],
            'countries.*'         => [
                'integer',
            ],
            'countries'           => [
                'array',
            ],
        ];
    }
}
