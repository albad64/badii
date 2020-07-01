<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySalaryRequest;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;
use App\Resource;
use App\Salary;
use App\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SalaryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('salary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Salary::with(['resource_code', 'work_country', 'currency', 'team'])->select(sprintf('%s.*', (new Salary)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'salary_show';
                $editGate      = 'salary_edit';
                $deleteGate    = 'salary_delete';
                $crudRoutePart = 'salaries';

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

            $table->editColumn('remote_job', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->remote_job ? 'checked' : null) . '>';
            });
            $table->addColumn('work_country_name', function ($row) {
                return $row->work_country ? $row->work_country->name : '';
            });

            $table->editColumn('week_working_string', function ($row) {
                return $row->week_working_string ? $row->week_working_string : "";
            });
            $table->addColumn('currency_code', function ($row) {
                return $row->currency ? $row->currency->code : '';
            });

            $table->editColumn('internal_department', function ($row) {
                return $row->internal_department ? Salary::INTERNAL_DEPARTMENT_SELECT[$row->internal_department] : '';
            });
            $table->editColumn('internal_office', function ($row) {
                return $row->internal_office ? Salary::INTERNAL_OFFICE_SELECT[$row->internal_office] : '';
            });
            $table->editColumn('annual_base_salary', function ($row) {
                return $row->annual_base_salary ? $row->annual_base_salary : "";
            });
            $table->editColumn('vat_daily_fee', function ($row) {
                return $row->vat_daily_fee ? $row->vat_daily_fee : "";
            });
            $table->editColumn('vat_daily_cost', function ($row) {
                return $row->vat_daily_cost ? $row->vat_daily_cost : "";
            });
            $table->editColumn('staffing_agency_amount', function ($row) {
                return $row->staffing_agency_amount ? $row->staffing_agency_amount : "";
            });

            $table->editColumn('reimb_km', function ($row) {
                return $row->reimb_km ? $row->reimb_km : "";
            });
            $table->editColumn('nca', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->nca ? 'checked' : null) . '>';
            });

            $table->editColumn('nca_frequency', function ($row) {
                return $row->nca_frequency ? Salary::NCA_FREQUENCY_SELECT[$row->nca_frequency] : '';
            });
            $table->editColumn('nca_value', function ($row) {
                return $row->nca_value ? $row->nca_value : "";
            });

            $table->editColumn('monthly_lsb', function ($row) {
                return $row->monthly_lsb ? $row->monthly_lsb : "";
            });
            $table->editColumn('variable_comp_target', function ($row) {
                return $row->variable_comp_target ? Salary::VARIABLE_COMP_TARGET_SELECT[$row->variable_comp_target] : '';
            });
            $table->editColumn('variable_comp_value', function ($row) {
                return $row->variable_comp_value ? $row->variable_comp_value : "";
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'resource_code', 'remote_job', 'work_country', 'currency', 'nca']);

            return $table->make(true);
        }

        $resources  = Resource::get();
        $countries  = Country::get();
        $currencies = Currency::get();
        $teams      = Team::get();

        return view('admin.salaries.index', compact('resources', 'countries', 'currencies', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('salary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $work_countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.salaries.create', compact('resource_codes', 'work_countries', 'currencies'));
    }

    public function store(StoreSalaryRequest $request)
    {
        $salary = Salary::create($request->all());

        return redirect()->route('admin.salaries.index');
    }

    public function edit(Salary $salary)
    {
        abort_if(Gate::denies('salary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $work_countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salary->load('resource_code', 'work_country', 'currency', 'team');

        return view('admin.salaries.edit', compact('resource_codes', 'work_countries', 'currencies', 'salary'));
    }

    public function update(UpdateSalaryRequest $request, Salary $salary)
    {
        $salary->update($request->all());

        return redirect()->route('admin.salaries.index');
    }

    public function show(Salary $salary)
    {
        abort_if(Gate::denies('salary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary->load('resource_code', 'work_country', 'currency', 'team');

        return view('admin.salaries.show', compact('salary'));
    }

    public function destroy(Salary $salary)
    {
        abort_if(Gate::denies('salary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary->delete();

        return back();
    }

    public function massDestroy(MassDestroySalaryRequest $request)
    {
        Salary::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
