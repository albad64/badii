<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPresentationRequest;
use App\Http\Requests\StorePresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;
use App\Presentation;
use App\Resource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PresentationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('presentation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presentations = Presentation::all();

        return view('admin.presentations.index', compact('presentations'));
    }

    public function create()
    {
        abort_if(Gate::denies('presentation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.presentations.create', compact('resource_codes'));
    }

    public function store(StorePresentationRequest $request)
    {
        $presentation = Presentation::create($request->all());

        return redirect()->route('admin.presentations.index');
    }

    public function edit(Presentation $presentation)
    {
        abort_if(Gate::denies('presentation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $presentation->load('resource_code');

        return view('admin.presentations.edit', compact('resource_codes', 'presentation'));
    }

    public function update(UpdatePresentationRequest $request, Presentation $presentation)
    {
        $presentation->update($request->all());

        return redirect()->route('admin.presentations.index');
    }

    public function show(Presentation $presentation)
    {
        abort_if(Gate::denies('presentation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presentation->load('resource_code');

        return view('admin.presentations.show', compact('presentation'));
    }

    public function destroy(Presentation $presentation)
    {
        abort_if(Gate::denies('presentation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presentation->delete();

        return back();
    }

    public function massDestroy(MassDestroyPresentationRequest $request)
    {
        Presentation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
