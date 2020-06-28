<?php

namespace App\Http\Controllers\Admin;

use App\CompaniesHoliday;
use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCompaniesHolidayRequest;
use App\Http\Requests\StoreCompaniesHolidayRequest;
use App\Http\Requests\UpdateCompaniesHolidayRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompaniesHolidaysController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('companies_holiday_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companiesHolidays = CompaniesHoliday::all();

        return view('admin.companiesHolidays.index', compact('companiesHolidays'));
    }

    public function create()
    {
        abort_if(Gate::denies('companies_holiday_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = Company::all()->pluck('company', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.companiesHolidays.create', compact('companies'));
    }

    public function store(StoreCompaniesHolidayRequest $request)
    {
        $companiesHoliday = CompaniesHoliday::create($request->all());

        return redirect()->route('admin.companies-holidays.index');
    }

    public function edit(CompaniesHoliday $companiesHoliday)
    {
        abort_if(Gate::denies('companies_holiday_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = Company::all()->pluck('company', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companiesHoliday->load('company');

        return view('admin.companiesHolidays.edit', compact('companies', 'companiesHoliday'));
    }

    public function update(UpdateCompaniesHolidayRequest $request, CompaniesHoliday $companiesHoliday)
    {
        $companiesHoliday->update($request->all());

        return redirect()->route('admin.companies-holidays.index');
    }

    public function show(CompaniesHoliday $companiesHoliday)
    {
        abort_if(Gate::denies('companies_holiday_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companiesHoliday->load('company');

        return view('admin.companiesHolidays.show', compact('companiesHoliday'));
    }

    public function destroy(CompaniesHoliday $companiesHoliday)
    {
        abort_if(Gate::denies('companies_holiday_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companiesHoliday->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompaniesHolidayRequest $request)
    {
        CompaniesHoliday::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
