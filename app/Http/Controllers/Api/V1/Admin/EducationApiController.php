<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Education;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Http\Resources\Admin\EducationResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EducationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('education_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EducationResource(Education::with(['resource_code'])->get());
    }

    public function store(StoreEducationRequest $request)
    {
        $education = Education::create($request->all());

        return (new EducationResource($education))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Education $education)
    {
        abort_if(Gate::denies('education_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EducationResource($education->load(['resource_code']));
    }

    public function update(UpdateEducationRequest $request, Education $education)
    {
        $education->update($request->all());

        return (new EducationResource($education))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Education $education)
    {
        abort_if(Gate::denies('education_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
