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

class HouseHoldController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('house_hold_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $houseHolds = HouseHold::all();

        return view('admin.houseHolds.index', compact('houseHolds'));
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
