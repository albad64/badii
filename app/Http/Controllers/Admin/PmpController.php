<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPmpRequest;
use App\Http\Requests\StorePmpRequest;
use App\Http\Requests\UpdatePmpRequest;
use App\JobGrade;
use App\Pmp;
use App\Resource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PmpController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pmp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pmps = Pmp::all();

        return view('admin.pmps.index', compact('pmps'));
    }

    public function create()
    {
        abort_if(Gate::denies('pmp_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $current_grades = JobGrade::all()->pluck('job_grade_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expected_grades = JobGrade::all()->pluck('job_grade_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pmps.create', compact('resource_codes', 'current_grades', 'expected_grades'));
    }

    public function store(StorePmpRequest $request)
    {
        $pmp = Pmp::create($request->all());

        return redirect()->route('admin.pmps.index');
    }

    public function edit(Pmp $pmp)
    {
        abort_if(Gate::denies('pmp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $current_grades = JobGrade::all()->pluck('job_grade_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expected_grades = JobGrade::all()->pluck('job_grade_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pmp->load('resource_code', 'current_grade', 'expected_grade');

        return view('admin.pmps.edit', compact('resource_codes', 'current_grades', 'expected_grades', 'pmp'));
    }

    public function update(UpdatePmpRequest $request, Pmp $pmp)
    {
        $pmp->update($request->all());

        return redirect()->route('admin.pmps.index');
    }

    public function show(Pmp $pmp)
    {
        abort_if(Gate::denies('pmp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pmp->load('resource_code', 'current_grade', 'expected_grade', 'pmpPmpDetails');

        return view('admin.pmps.show', compact('pmp'));
    }

    public function destroy(Pmp $pmp)
    {
        abort_if(Gate::denies('pmp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pmp->delete();

        return back();
    }

    public function massDestroy(MassDestroyPmpRequest $request)
    {
        Pmp::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
