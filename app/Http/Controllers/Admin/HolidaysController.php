<?php

namespace App\Http\Controllers\Admin;

use App\Holiday;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHolidayRequest;
use App\Http\Requests\StoreHolidayRequest;
use App\Http\Requests\UpdateHolidayRequest;
use App\Resource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HolidaysController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('holiday_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $holidays = Holiday::all();

        $resources = Resource::get()->pluck('resource_code')->toArray();

        return view('admin.holidays.index', compact('holidays', 'resources'));
    }

    public function create()
    {
        abort_if(Gate::denies('holiday_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.holidays.create', compact('resource_codes'));
    }

    public function store(StoreHolidayRequest $request)
    {
        $holiday = Holiday::create($request->all());

        return redirect()->route('admin.holidays.index');
    }

    public function edit(Holiday $holiday)
    {
        abort_if(Gate::denies('holiday_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $holiday->load('resource_code');

        return view('admin.holidays.edit', compact('resource_codes', 'holiday'));
    }

    public function update(UpdateHolidayRequest $request, Holiday $holiday)
    {
        $holiday->update($request->all());

        return redirect()->route('admin.holidays.index');
    }

    public function show(Holiday $holiday)
    {
        abort_if(Gate::denies('holiday_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $holiday->load('resource_code');

        return view('admin.holidays.show', compact('holiday'));
    }

    public function destroy(Holiday $holiday)
    {
        abort_if(Gate::denies('holiday_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $holiday->delete();

        return back();
    }

    public function massDestroy(MassDestroyHolidayRequest $request)
    {
        Holiday::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
