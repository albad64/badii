<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePmpRequest;
use App\Http\Requests\UpdatePmpRequest;
use App\Http\Resources\Admin\PmpResource;
use App\Pmp;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PmpApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pmp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PmpResource(Pmp::with(['resource_code', 'current_grade', 'expected_grade'])->get());
    }

    public function store(StorePmpRequest $request)
    {
        $pmp = Pmp::create($request->all());

        return (new PmpResource($pmp))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pmp $pmp)
    {
        abort_if(Gate::denies('pmp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PmpResource($pmp->load(['resource_code', 'current_grade', 'expected_grade']));
    }

    public function update(UpdatePmpRequest $request, Pmp $pmp)
    {
        $pmp->update($request->all());

        return (new PmpResource($pmp))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pmp $pmp)
    {
        abort_if(Gate::denies('pmp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pmp->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
