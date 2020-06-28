<?php

namespace App\Http\Controllers\Admin;

use App\CompaniesBankHoliday;
use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCompaniesBankHolidayRequest;
use App\Http\Requests\StoreCompaniesBankHolidayRequest;
use App\Http\Requests\UpdateCompaniesBankHolidayRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompaniesBankHolidaysController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('companies_bank_holiday_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companiesBankHolidays = CompaniesBankHoliday::all();

        return view('admin.companiesBankHolidays.index', compact('companiesBankHolidays'));
    }

    public function create()
    {
        abort_if(Gate::denies('companies_bank_holiday_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = Company::all()->pluck('company', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.companiesBankHolidays.create', compact('companies'));
    }

    public function store(StoreCompaniesBankHolidayRequest $request)
    {
        $companiesBankHoliday = CompaniesBankHoliday::create($request->all());

        return redirect()->route('admin.companies-bank-holidays.index');
    }

    public function edit(CompaniesBankHoliday $companiesBankHoliday)
    {
        abort_if(Gate::denies('companies_bank_holiday_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = Company::all()->pluck('company', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companiesBankHoliday->load('company');

        return view('admin.companiesBankHolidays.edit', compact('companies', 'companiesBankHoliday'));
    }

    public function update(UpdateCompaniesBankHolidayRequest $request, CompaniesBankHoliday $companiesBankHoliday)
    {
        $companiesBankHoliday->update($request->all());

        return redirect()->route('admin.companies-bank-holidays.index');
    }

    public function show(CompaniesBankHoliday $companiesBankHoliday)
    {
        abort_if(Gate::denies('companies_bank_holiday_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companiesBankHoliday->load('company');

        return view('admin.companiesBankHolidays.show', compact('companiesBankHoliday'));
    }

    public function destroy(CompaniesBankHoliday $companiesBankHoliday)
    {
        abort_if(Gate::denies('companies_bank_holiday_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companiesBankHoliday->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompaniesBankHolidayRequest $request)
    {
        CompaniesBankHoliday::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
