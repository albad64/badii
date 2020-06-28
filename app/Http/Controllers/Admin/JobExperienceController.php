<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyJobExperienceRequest;
use App\Http\Requests\StoreJobExperienceRequest;
use App\Http\Requests\UpdateJobExperienceRequest;
use App\JobExperience;
use App\Resource;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class JobExperienceController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('job_experience_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobExperiences = JobExperience::all();

        return view('admin.jobExperiences.index', compact('jobExperiences'));
    }

    public function create()
    {
        abort_if(Gate::denies('job_experience_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.jobExperiences.create', compact('resource_codes'));
    }

    public function store(StoreJobExperienceRequest $request)
    {
        $jobExperience = JobExperience::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $jobExperience->id]);
        }

        return redirect()->route('admin.job-experiences.index');
    }

    public function edit(JobExperience $jobExperience)
    {
        abort_if(Gate::denies('job_experience_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jobExperience->load('resource_code');

        return view('admin.jobExperiences.edit', compact('resource_codes', 'jobExperience'));
    }

    public function update(UpdateJobExperienceRequest $request, JobExperience $jobExperience)
    {
        $jobExperience->update($request->all());

        return redirect()->route('admin.job-experiences.index');
    }

    public function show(JobExperience $jobExperience)
    {
        abort_if(Gate::denies('job_experience_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobExperience->load('resource_code');

        return view('admin.jobExperiences.show', compact('jobExperience'));
    }

    public function destroy(JobExperience $jobExperience)
    {
        abort_if(Gate::denies('job_experience_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobExperience->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobExperienceRequest $request)
    {
        JobExperience::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('job_experience_create') && Gate::denies('job_experience_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new JobExperience();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
