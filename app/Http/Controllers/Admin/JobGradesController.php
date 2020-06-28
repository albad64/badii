<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJobGradeRequest;
use App\Http\Requests\StoreJobGradeRequest;
use App\Http\Requests\UpdateJobGradeRequest;
use App\JobGrade;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobGradesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('job_grade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobGrades = JobGrade::all();

        return view('admin.jobGrades.index', compact('jobGrades'));
    }

    public function create()
    {
        abort_if(Gate::denies('job_grade_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobGrades.create');
    }

    public function store(StoreJobGradeRequest $request)
    {
        $jobGrade = JobGrade::create($request->all());

        return redirect()->route('admin.job-grades.index');
    }

    public function edit(JobGrade $jobGrade)
    {
        abort_if(Gate::denies('job_grade_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobGrades.edit', compact('jobGrade'));
    }

    public function update(UpdateJobGradeRequest $request, JobGrade $jobGrade)
    {
        $jobGrade->update($request->all());

        return redirect()->route('admin.job-grades.index');
    }

    public function show(JobGrade $jobGrade)
    {
        abort_if(Gate::denies('job_grade_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobGrades.show', compact('jobGrade'));
    }

    public function destroy(JobGrade $jobGrade)
    {
        abort_if(Gate::denies('job_grade_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobGrade->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobGradeRequest $request)
    {
        JobGrade::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
