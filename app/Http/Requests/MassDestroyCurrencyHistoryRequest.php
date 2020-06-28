<?php

namespace App\Http\Requests;

use App\CurrencyHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCurrencyHistoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('currency_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:currency_histories,id',
        ];
    }
}
