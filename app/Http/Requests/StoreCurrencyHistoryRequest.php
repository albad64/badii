<?php

namespace App\Http\Requests;

use App\CurrencyHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCurrencyHistoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('currency_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'currency_id'   => [
                'required',
                'integer',
            ],
            'date_validity' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
