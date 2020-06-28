<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CompaniesBankHoliday;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompaniesBankHolidayRequest;
use App\Http\Requests\UpdateCompaniesBankHolidayRequest;
use App\Http\Resources\Admin\CompaniesBankHolidayResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompaniesBankHolidaysApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('companies_bank_holiday_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompaniesBankHolidayResource(CompaniesBankHoliday::with(['company'])->get());
    }

    public function store(StoreCompaniesBankHolidayRequest $request)
    {
        $companiesBankHoliday = CompaniesBankHoliday::create($request->all());

        return (new CompaniesBankHolidayResource($companiesBankHoliday))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CompaniesBankHoliday $companiesBankHoliday)
    {
        abort_if(Gate::denies('companies_bank_holiday_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompaniesBankHolidayResource($companiesBankHoliday->load(['company']));
    }

    public function update(UpdateCompaniesBankHolidayRequest $request, CompaniesBankHoliday $companiesBankHoliday)
    {
        $companiesBankHoliday->update($request->all());

        return (new CompaniesBankHolidayResource($companiesBankHoliday))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CompaniesBankHoliday $companiesBankHoliday)
    {
        abort_if(Gate::denies('companies_bank_holiday_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companiesBankHoliday->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
