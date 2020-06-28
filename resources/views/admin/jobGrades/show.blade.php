@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jobGrade.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-grades.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jobGrade.fields.id') }}
                        </th>
                        <td>
                            {{ $jobGrade->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobGrade.fields.job_grade_name') }}
                        </th>
                        <td>
                            {{ $jobGrade->job_grade_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobGrade.fields.organizational_area') }}
                        </th>
                        <td>
                            {{ App\JobGrade::ORGANIZATIONAL_AREA_RADIO[$jobGrade->organizational_area] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobGrade.fields.job_grade') }}
                        </th>
                        <td>
                            {{ App\JobGrade::JOB_GRADE_SELECT[$jobGrade->job_grade] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobGrade.fields.job_level') }}
                        </th>
                        <td>
                            {{ App\JobGrade::JOB_LEVEL_SELECT[$jobGrade->job_level] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-grades.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection