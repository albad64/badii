<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CompaniesHoliday;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompaniesHolidayRequest;
use App\Http\Requests\UpdateCompaniesHolidayRequest;
use App\Http\Resources\Admin\CompaniesHolidayResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompaniesHolidaysApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('companies_holiday_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompaniesHolidayResource(CompaniesHoliday::with(['company'])->get());
    }

    public function store(StoreCompaniesHolidayRequest $request)
    {
        $companiesHoliday = CompaniesHoliday::create($request->all());

        return (new CompaniesHolidayResource($companiesHoliday))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CompaniesHoliday $companiesHoliday)
    {
        abort_if(Gate::denies('companies_holiday_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompaniesHolidayResource($companiesHoliday->load(['company']));
    }

    public function update(UpdateCompaniesHolidayRequest $request, CompaniesHoliday $companiesHoliday)
    {
        $companiesHoliday->update($request->all());

        return (new CompaniesHolidayResource($companiesHoliday))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CompaniesHoliday $companiesHoliday)
    {
        abort_if(Gate::denies('companies_holiday_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companiesHoliday->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
