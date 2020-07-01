<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPmpRequest;
use App\Http\Requests\StorePmpRequest;
use App\Http\Requests\UpdatePmpRequest;
use App\JobGrade;
use App\Pmp;
use App\Resource;
use App\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PmpController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pmp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Pmp::with(['resource_code', 'current_grade', 'expected_grade', 'team'])->select(sprintf('%s.*', (new Pmp)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pmp_show';
                $editGate      = 'pmp_edit';
                $deleteGate    = 'pmp_delete';
                $crudRoutePart = 'pmps';

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
            $table->editColumn('pmp_year', function ($row) {
                return $row->pmp_year ? $row->pmp_year : "";
            });
            $table->addColumn('current_grade_job_grade_name', function ($row) {
                return $row->current_grade ? $row->current_grade->job_grade_name : '';
            });

            $table->addColumn('expected_grade_job_grade_name', function ($row) {
                return $row->expected_grade ? $row->expected_grade->job_grade_name : '';
            });

            $table->editColumn('objective_value', function ($row) {
                return $row->objective_value ? $row->objective_value : "";
            });

            $table->editColumn('overall_mid_year_evaluation', function ($row) {
                return $row->overall_mid_year_evaluation ? $row->overall_mid_year_evaluation : "";
            });
            $table->editColumn('overall_end_year_evaluation', function ($row) {
                return $row->overall_end_year_evaluation ? $row->overall_end_year_evaluation : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'resource_code', 'current_grade', 'expected_grade']);

            return $table->make(true);
        }

        $resources  = Resource::get();
        $job_grades = JobGrade::get();
        $job_grades = JobGrade::get();
        $teams      = Team::get();

        return view('admin.pmps.index', compact('resources', 'job_grades', 'job_grades', 'teams'));
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

        $pmp->load('resource_code', 'current_grade', 'expected_grade', 'team');

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

        $pmp->load('resource_code', 'current_grade', 'expected_grade', 'team', 'pmpPmpDetails');

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
