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
use Yajra\DataTables\Facades\DataTables;

class CurrencyHistoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('currency_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CurrencyHistory::with(['currency'])->select(sprintf('%s.*', (new CurrencyHistory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'currency_history_show';
                $editGate      = 'currency_history_edit';
                $deleteGate    = 'currency_history_delete';
                $crudRoutePart = 'currency-histories';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('currency_code', function ($row) {
                return $row->currency ? $row->currency->code : '';
            });

            $table->editColumn('conversion_rate', function ($row) {
                return $row->conversion_rate ? $row->conversion_rate : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'currency']);

            return $table->make(true);
        }

        $currencies = Currency::get()->pluck('code')->toArray();

        return view('admin.currencyHistories.index', compact('currencies'));
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
