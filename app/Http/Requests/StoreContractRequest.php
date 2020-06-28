<?php

namespace App\Http\Requests;

use App\Contract;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreContractRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('contract_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'resource_code_id'      => [
                'required',
                'integer',
            ],
            'start_date'            => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_date'              => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'termination_date'      => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_trial_period_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'weekly_working_hours'  => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
