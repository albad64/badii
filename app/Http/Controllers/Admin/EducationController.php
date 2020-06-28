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
use Yajra\DataTables\Facades\DataTables;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('education_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Education::with(['resource_code'])->select(sprintf('%s.*', (new Education)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'education_show';
                $editGate      = 'education_edit';
                $deleteGate    = 'education_delete';
                $crudRoutePart = 'education';

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
            $table->editColumn('order_number', function ($row) {
                return $row->order_number ? $row->order_number : "";
            });
            $table->editColumn('graduated_year', function ($row) {
                return $row->graduated_year ? $row->graduated_year : "";
            });
            $table->editColumn('education_level', function ($row) {
                return $row->education_level ? Education::EDUCATION_LEVEL_SELECT[$row->education_level] : '';
            });
            $table->editColumn('education_area', function ($row) {
                return $row->education_area ? $row->education_area : "";
            });
            $table->editColumn('education_location', function ($row) {
                return $row->education_location ? $row->education_location : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'resource_code']);

            return $table->make(true);
        }

        return view('admin.education.index');
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
