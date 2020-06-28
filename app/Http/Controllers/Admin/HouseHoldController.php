<?php

namespace App\Http\Controllers\Admin;

use App\HouseHold;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHouseHoldRequest;
use App\Http\Requests\StoreHouseHoldRequest;
use App\Http\Requests\UpdateHouseHoldRequest;
use App\Resource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HouseHoldController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('house_hold_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = HouseHold::with(['resource_code'])->select(sprintf('%s.*', (new HouseHold)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'house_hold_show';
                $editGate      = 'house_hold_edit';
                $deleteGate    = 'house_hold_delete';
                $crudRoutePart = 'house-holds';

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
            $table->editColumn('prog', function ($row) {
                return $row->prog ? $row->prog : "";
            });
            $table->editColumn('relationship_type', function ($row) {
                return $row->relationship_type ? HouseHold::RELATIONSHIP_TYPE_SELECT[$row->relationship_type] : '';
            });
            $table->editColumn('relative_first_name', function ($row) {
                return $row->relative_first_name ? $row->relative_first_name : "";
            });
            $table->editColumn('relative_last_name', function ($row) {
                return $row->relative_last_name ? $row->relative_last_name : "";
            });
            $table->editColumn('percentage_charged', function ($row) {
                return $row->percentage_charged ? $row->percentage_charged : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'resource_code']);

            return $table->make(true);
        }

        return view('admin.houseHolds.index');
    }

    public function create()
    {
        abort_if(Gate::denies('house_hold_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.houseHolds.create', compact('resource_codes'));
    }

    public function store(StoreHouseHoldRequest $request)
    {
        $houseHold = HouseHold::create($request->all());

        return redirect()->route('admin.house-holds.index');
    }

    public function edit(HouseHold $houseHold)
    {
        abort_if(Gate::denies('house_hold_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $houseHold->load('resource_code');

        return view('admin.houseHolds.edit', compact('resource_codes', 'houseHold'));
    }

    public function update(UpdateHouseHoldRequest $request, HouseHold $houseHold)
    {
        $houseHold->update($request->all());

        return redirect()->route('admin.house-holds.index');
    }

    public function show(HouseHold $houseHold)
    {
        abort_if(Gate::denies('house_hold_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $houseHold->load('resource_code');

        return view('admin.houseHolds.show', compact('houseHold'));
    }

    public function destroy(HouseHold $houseHold)
    {
        abort_if(Gate::denies('house_hold_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $houseHold->delete();

        return back();
    }

    public function massDestroy(MassDestroyHouseHoldRequest $request)
    {
        HouseHold::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
