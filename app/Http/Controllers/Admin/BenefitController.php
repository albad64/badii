<?php

namespace App\Http\Controllers\Admin;

use App\Benefit;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBenefitRequest;
use App\Http\Requests\StoreBenefitRequest;
use App\Http\Requests\UpdateBenefitRequest;
use App\Resource;
use App\Team;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BenefitController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('benefit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Benefit::with(['resource_code', 'currency', 'team'])->select(sprintf('%s.*', (new Benefit)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'benefit_show';
                $editGate      = 'benefit_edit';
                $deleteGate    = 'benefit_delete';
                $crudRoutePart = 'benefits';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('resource_code_resource_code', function ($row) {
                return $row->resource_code ? $row->resource_code->resource_code : '';
            });

            $table->editColumn('resource_code.first_name', function ($row) {
                return $row->resource_code ? (is_string($row->resource_code) ? $row->resource_code : $row->resource_code->first_name) : '';
            });
            $table->editColumn('resource_code.last_name', function ($row) {
                return $row->resource_code ? (is_string($row->resource_code) ? $row->resource_code : $row->resource_code->last_name) : '';
            });
            $table->editColumn('benefit_extra_type', function ($row) {
                return $row->benefit_extra_type ? Benefit::BENEFIT_EXTRA_TYPE_SELECT[$row->benefit_extra_type] : '';
            });
            $table->editColumn('benefit_type', function ($row) {
                return $row->benefit_type ? Benefit::BENEFIT_TYPE_SELECT[$row->benefit_type] : '';
            });

            $table->addColumn('currency_code', function ($row) {
                return $row->currency ? $row->currency->code : '';
            });

            $table->editColumn('total_cost', function ($row) {
                return $row->total_cost ? $row->total_cost : "";
            });
            $table->editColumn('optional_value', function ($row) {
                return $row->optional_value ? $row->optional_value : "";
            });
            $table->editColumn('fringe_benefit', function ($row) {
                return $row->fringe_benefit ? $row->fringe_benefit : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'resource_code', 'currency']);

            return $table->make(true);
        }

        $resources  = Resource::get();
        $currencies = Currency::get();
        $teams      = Team::get();

        return view('admin.benefits.index', compact('resources', 'currencies', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('benefit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.benefits.create', compact('resource_codes', 'currencies'));
    }

    public function store(StoreBenefitRequest $request)
    {
        $benefit = Benefit::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $benefit->id]);
        }

        return redirect()->route('admin.benefits.index');
    }

    public function edit(Benefit $benefit)
    {
        abort_if(Gate::denies('benefit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource_codes = Resource::all()->pluck('resource_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $benefit->load('resource_code', 'currency', 'team');

        return view('admin.benefits.edit', compact('resource_codes', 'currencies', 'benefit'));
    }

    public function update(UpdateBenefitRequest $request, Benefit $benefit)
    {
        $benefit->update($request->all());

        return redirect()->route('admin.benefits.index');
    }

    public function show(Benefit $benefit)
    {
        abort_if(Gate::denies('benefit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $benefit->load('resource_code', 'currency', 'team');

        return view('admin.benefits.show', compact('benefit'));
    }

    public function destroy(Benefit $benefit)
    {
        abort_if(Gate::denies('benefit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $benefit->delete();

        return back();
    }

    public function massDestroy(MassDestroyBenefitRequest $request)
    {
        Benefit::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('benefit_create') && Gate::denies('benefit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Benefit();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
