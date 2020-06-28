<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CurrencyHistory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCurrencyHistoryRequest;
use App\Http\Requests\UpdateCurrencyHistoryRequest;
use App\Http\Resources\Admin\CurrencyHistoryResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrencyHistoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('currency_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CurrencyHistoryResource(CurrencyHistory::with(['currency'])->get());
    }

    public function store(StoreCurrencyHistoryRequest $request)
    {
        $currencyHistory = CurrencyHistory::create($request->all());

        return (new CurrencyHistoryResource($currencyHistory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CurrencyHistory $currencyHistory)
    {
        abort_if(Gate::denies('currency_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CurrencyHistoryResource($currencyHistory->load(['currency']));
    }

    public function update(UpdateCurrencyHistoryRequest $request, CurrencyHistory $currencyHistory)
    {
        $currencyHistory->update($request->all());

        return (new CurrencyHistoryResource($currencyHistory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CurrencyHistory $currencyHistory)
    {
        abort_if(Gate::denies('currency_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencyHistory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
