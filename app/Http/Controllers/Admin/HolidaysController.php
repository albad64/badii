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
use Yajra\DataTables\Facades\DataTables;

class HolidaysController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('holiday_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Holiday::with(['resource_code'])->select(sprintf('%s.*', (new Holiday)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'holiday_show';
                $editGate      = 'holiday_edit';
                $deleteGate    = 'holiday_delete';
                $crudRoutePart = 'holidays';

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
            $table->editColumn('holidays_type', function ($row) {
                return $row->holidays_type ? Holiday::HOLIDAYS_TYPE_SELECT[$row->holidays_type] : '';
            });
            $table->editColumn('holiday_year', function ($row) {
                return $row->holiday_year ? $row->holiday_year : "";
            });
            $table->editColumn('holiday_month', function ($row) {
                return $row->holiday_month ? $row->holiday_month : "";
            });
            $table->editColumn('holiday_residual', function ($row) {
                return $row->holiday_residual ? $row->holiday_residual : "";
            });
            $table->editColumn('holiday_actual', function ($row) {
                return $row->holiday_actual ? $row->holiday_actual : "";
            });
            $table->editColumn('holiday_enjoyed', function ($row) {
                return $row->holiday_enjoyed ? $row->holiday_enjoyed : "";
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Holiday::STATUS_RADIO[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'resource_code']);

            return $table->make(true);
        }

        $resources = Resource::get()->pluck('resource_code')->toArray();

        return view('admin.holidays.index', compact('resources'));
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
