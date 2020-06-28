<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPmpDetailRequest;
use App\Http\Requests\StorePmpDetailRequest;
use App\Http\Requests\UpdatePmpDetailRequest;
use App\Pmp;
use App\PmpDetail;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PmpDetailController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pmp_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pmpDetails = PmpDetail::all();

        return view('admin.pmpDetails.index', compact('pmpDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('pmp_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pmps = Pmp::all()->pluck('pmp_year', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pmpDetails.create', compact('pmps'));
    }

    public function store(StorePmpDetailRequest $request)
    {
        $pmpDetail = PmpDetail::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $pmpDetail->id]);
        }

        return redirect()->route('admin.pmp-details.index');
    }

    public function edit(PmpDetail $pmpDetail)
    {
        abort_if(Gate::denies('pmp_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pmps = Pmp::all()->pluck('pmp_year', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pmpDetail->load('pmp');

        return view('admin.pmpDetails.edit', compact('pmps', 'pmpDetail'));
    }

    public function update(UpdatePmpDetailRequest $request, PmpDetail $pmpDetail)
    {
        $pmpDetail->update($request->all());

        return redirect()->route('admin.pmp-details.index');
    }

    public function show(PmpDetail $pmpDetail)
    {
        abort_if(Gate::denies('pmp_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pmpDetail->load('pmp');

        return view('admin.pmpDetails.show', compact('pmpDetail'));
    }

    public function destroy(PmpDetail $pmpDetail)
    {
        abort_if(Gate::denies('pmp_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pmpDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyPmpDetailRequest $request)
    {
        PmpDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pmp_detail_create') && Gate::denies('pmp_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PmpDetail();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
