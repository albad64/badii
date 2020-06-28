<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreJobExperienceRequest;
use App\Http\Requests\UpdateJobExperienceRequest;
use App\Http\Resources\Admin\JobExperienceResource;
use App\JobExperience;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobExperienceApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('job_experience_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobExperienceResource(JobExperience::with(['resource_code'])->get());
    }

    public function store(StoreJobExperienceRequest $request)
    {
        $jobExperience = JobExperience::create($request->all());

        return (new JobExperienceResource($jobExperience))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JobExperience $jobExperience)
    {
        abort_if(Gate::denies('job_experience_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobExperienceResource($jobExperience->load(['resource_code']));
    }

    public function update(UpdateJobExperienceRequest $request, JobExperience $jobExperience)
    {
        $jobExperience->update($request->all());

        return (new JobExperienceResource($jobExperience))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JobExperience $jobExperience)
    {
        abort_if(Gate::denies('job_experience_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobExperience->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
