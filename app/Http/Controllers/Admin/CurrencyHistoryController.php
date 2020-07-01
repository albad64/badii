<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\CurrencyHistory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCurrencyHistoryRequest;
use App\Http\Requests\StoreCurrencyHistoryRequest;
use App\Http\Requests\UpdateCurrencyHistoryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrencyHistoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('currency_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencyHistories = CurrencyHistory::all();

        $currencies = Currency::get()->pluck('code')->toArray();

        return view('admin.currencyHistories.index', compact('currencyHistories', 'currencies'));
    }

    public function create()
    {
        abort_if(Gate::denies('currency_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.currencyHistories.create', compact('currencies'));
    }

    public function store(StoreCurrencyHistoryRequest $request)
    {
        $currencyHistory = CurrencyHistory::create($request->all());

        return redirect()->route('admin.currency-histories.index');
    }

    public function edit(CurrencyHistory $currencyHistory)
    {
        abort_if(Gate::denies('currency_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencyHistory->load('currency');

        return view('admin.currencyHistories.edit', compact('currencies', 'currencyHistory'));
    }

    public function update(UpdateCurrencyHistoryRequest $request, CurrencyHistory $currencyHistory)
    {
        $currencyHistory->update($request->all());

        return redirect()->route('admin.currency-histories.index');
    }

    public function show(CurrencyHistory $currencyHistory)
    {
        abort_if(Gate::denies('currency_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencyHistory->load('currency');

        return view('admin.currencyHistories.show', compact('currencyHistory'));
    }

    public function destroy(CurrencyHistory $currencyHistory)
    {
        abort_if(Gate::denies('currency_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencyHistory->delete();

        return back();
    }

    public function massDestroy(MassDestroyCurrencyHistoryRequest $request)
    {
        CurrencyHistory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
