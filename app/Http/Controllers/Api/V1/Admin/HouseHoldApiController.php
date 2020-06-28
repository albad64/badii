<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\HouseHold;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHouseHoldRequest;
use App\Http\Requests\UpdateHouseHoldRequest;
use App\Http\Resources\Admin\HouseHoldResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HouseHoldApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('house_hold_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HouseHoldResource(HouseHold::with(['resource_code'])->get());
    }

    public function store(StoreHouseHoldRequest $request)
    {
        $houseHold = HouseHold::create($request->all());

        return (new HouseHoldResource($houseHold))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HouseHold $houseHold)
    {
        abort_if(Gate::denies('house_hold_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HouseHoldResource($houseHold->load(['resource_code']));
    }

    public function update(UpdateHouseHoldRequest $request, HouseHold $houseHold)
    {
        $houseHold->update($request->all());

        return (new HouseHoldResource($houseHold))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HouseHold $houseHold)
    {
        abort_if(Gate::denies('house_hold_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $houseHold->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
