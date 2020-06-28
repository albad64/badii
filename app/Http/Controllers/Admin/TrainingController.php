<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrainingRequest;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Resource;
use App\Training;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('training_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainings = Training::all();

        return view('admin.trainings.index', compact('trainings'));
    }

    public function create()
    {
        abort_if(Gate::denies('training_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.trainings.create', compact('resource_codes'));
    }

    public function store(StoreTrainingRequest $request)
    {
        $training = Training::create($request->all());

        return redirect()->route('admin.trainings.index');
    }

    public function edit(Training $training)
    {
        abort_if(Gate::denies('training_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $training->load('resource_code');

        return view('admin.trainings.edit', compact('resource_codes', 'training'));
    }

    public function update(UpdateTrainingRequest $request, Training $training)
    {
        $training->update($request->all());

        return redirect()->route('admin.trainings.index');
    }

    public function show(Training $training)
    {
        abort_if(Gate::denies('training_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $training->load('resource_code');

        return view('admin.trainings.show', compact('training'));
    }

    public function destroy(Training $training)
    {
        abort_if(Gate::denies('training_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $training->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrainingRequest $request)
    {
        Training::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
