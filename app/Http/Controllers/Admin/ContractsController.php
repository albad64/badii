<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Contract;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContractRequest;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use App\Resource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContractsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('contract_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Contract::with(['resource_code', 'company', 'report_resource_code'])->select(sprintf('%s.*', (new Contract)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'contract_show';
                $editGate      = 'contract_edit';
                $deleteGate    = 'contract_delete';
                $crudRoutePart = 'contracts';

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
            $table->addColumn('resource_code_resource_code', function ($row) {
                return $row->resource_code ? $row->resource_code->resource_code : '';
            });

            $table->editColumn('resource_code.first_name', function ($row) {
                return $row->resource_code ? (is_string($row->resource_code) ? $row->resource_code : $row->resource_code->first_name) : '';
            });
            $table->editColumn('resource_code.last_name', function ($row) {
                return $row->resource_code ? (is_string($row->resource_code) ? $row->resource_code : $row->resource_code->last_name) : '';
            });

            $table->addColumn('company_company', function ($row) {
                return $row->company ? $row->company->company : '';
            });

            $table->editColumn('head_office', function ($row) {
                return $row->head_office ? Contract::HEAD_OFFICE_SELECT[$row->head_office] : '';
            });
            $table->editColumn('contract_type', function ($row) {
                return $row->contract_type ? Contract::CONTRACT_TYPE_SELECT[$row->contract_type] : '';
            });
            $table->editColumn('contract_duration', function ($row) {
                return $row->contract_duration ? Contract::CONTRACT_DURATION_SELECT[$row->contract_duration] : '';
            });
            $table->editColumn('contract_time', function ($row) {
                return $row->contract_time ? Contract::CONTRACT_TIME_SELECT[$row->contract_time] : '';
            });
            $table->editColumn('area_type', function ($row) {
                return $row->area_type ? Contract::AREA_TYPE_SELECT[$row->area_type] : '';
            });

            $table->editColumn('termination_code', function ($row) {
                return $row->termination_code ? Contract::TERMINATION_CODE_SELECT[$row->termination_code] : '';
            });
            $table->editColumn('calculation_lps', function ($row) {
                return $row->calculation_lps ? $row->calculation_lps : "";
            });
            $table->editColumn('ccnl', function ($row) {
                return $row->ccnl ? Contract::CCNL_SELECT[$row->ccnl] : '';
            });
            $table->editColumn('clb_category', function ($row) {
                return $row->clb_category ? Contract::CLB_CATEGORY_SELECT[$row->clb_category] : '';
            });
            $table->editColumn('clb_level', function ($row) {
                return $row->clb_level ? Contract::CLB_LEVEL_SELECT[$row->clb_level] : '';
            });
            $table->editColumn('us_category', function ($row) {
                return $row->us_category ? Contract::US_CATEGORY_SELECT[$row->us_category] : '';
            });

            $table->editColumn('weekly_working_hours', function ($row) {
                return $row->weekly_working_hours ? $row->weekly_working_hours : "";
            });
            $table->addColumn('report_resource_code_resource_code', function ($row) {
                return $row->report_resource_code ? $row->report_resource_code->resource_code : '';
            });

            $table->editColumn('hr_canteen_charge', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->hr_canteen_charge ? 'checked' : null) . '>';
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'resource_code', 'company', 'report_resource_code', 'hr_canteen_charge']);

            return $table->make(true);
        }

        return view('admin.contracts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('contract_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companies = Company::all()->pluck('company', 'id')->prepend(trans('global.pleaseSelect'), '');

        $report_resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contracts.create', compact('resource_codes', 'companies', 'report_resource_codes'));
    }

    public function store(StoreContractRequest $request)
    {
        $contract = Contract::create($request->all());

        return redirect()->route('admin.contracts.index');
    }

    public function edit(Contract $contract)
    {
        abort_if(Gate::denies('contract_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companies = Company::all()->pluck('company', 'id')->prepend(trans('global.pleaseSelect'), '');

        $report_resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contract->load('resource_code', 'company', 'report_resource_code');

        return view('admin.contracts.edit', compact('resource_codes', 'companies', 'report_resource_codes', 'contract'));
    }

    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $contract->update($request->all());

        return redirect()->route('admin.contracts.index');
    }

    public function show(Contract $contract)
    {
        abort_if(Gate::denies('contract_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract->load('resource_code', 'company', 'report_resource_code');

        return view('admin.contracts.show', compact('contract'));
    }

    public function destroy(Contract $contract)
    {
        abort_if(Gate::denies('contract_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract->delete();

        return back();
    }

    public function massDestroy(MassDestroyContractRequest $request)
    {
        Contract::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
