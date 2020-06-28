<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePmpDetailRequest;
use App\Http\Requests\UpdatePmpDetailRequest;
use App\Http\Resources\Admin\PmpDetailResource;
use App\PmpDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PmpDetailApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pmp_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PmpDetailResource(PmpDetail::with(['pmp'])->get());
    }

    public function store(StorePmpDetailRequest $request)
    {
        $pmpDetail = PmpDetail::create($request->all());

        return (new PmpDetailResource($pmpDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PmpDetail $pmpDetail)
    {
        abort_if(Gate::denies('pmp_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PmpDetailResource($pmpDetail->load(['pmp']));
    }

    public function update(UpdatePmpDetailRequest $request, PmpDetail $pmpDetail)
    {
        $pmpDetail->update($request->all());

        return (new PmpDetailResource($pmpDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PmpDetail $pmpDetail)
    {
        abort_if(Gate::denies('pmp_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pmpDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
