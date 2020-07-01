<?php

namespace App\Http\Controllers\Admin;

use App\Education;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEducationRequest;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Resource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EducationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('education_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education = Education::all();

        return view('admin.education.index', compact('education'));
    }

    public function create()
    {
        abort_if(Gate::denies('education_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.education.create', compact('resource_codes'));
    }

    public function store(StoreEducationRequest $request)
    {
        $education = Education::create($request->all());

        return redirect()->route('admin.education.index');
    }

    public function edit(Education $education)
    {
        abort_if(Gate::denies('education_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $education->load('resource_code');

        return view('admin.education.edit', compact('resource_codes', 'education'));
    }

    public function update(UpdateEducationRequest $request, Education $education)
    {
        $education->update($request->all());

        return redirect()->route('admin.education.index');
    }

    public function show(Education $education)
    {
        abort_if(Gate::denies('education_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education->load('resource_code');

        return view('admin.education.show', compact('education'));
    }

    public function destroy(Education $education)
    {
        abort_if(Gate::denies('education_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education->delete();

        return back();
    }

    public function massDestroy(MassDestroyEducationRequest $request)
    {
        Education::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
