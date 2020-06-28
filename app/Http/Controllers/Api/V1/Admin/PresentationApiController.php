<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;
use App\Http\Resources\Admin\PresentationResource;
use App\Presentation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PresentationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('presentation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PresentationResource(Presentation::with(['resource_code'])->get());
    }

    public function store(StorePresentationRequest $request)
    {
        $presentation = Presentation::create($request->all());

        return (new PresentationResource($presentation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Presentation $presentation)
    {
        abort_if(Gate::denies('presentation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PresentationResource($presentation->load(['resource_code']));
    }

    public function update(UpdatePresentationRequest $request, Presentation $presentation)
    {
        $presentation->update($request->all());

        return (new PresentationResource($presentation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Presentation $presentation)
    {
        abort_if(Gate::denies('presentation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presentation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
