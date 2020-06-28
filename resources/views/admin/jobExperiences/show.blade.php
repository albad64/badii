@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jobExperience.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jobExperience.fields.id') }}
                        </th>
                        <td>
                            {{ $jobExperience->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobExperience.fields.resource_code') }}
                        </th>
                        <td>
                            {{ $jobExperience->resource_code->resource_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobExperience.fields.order_number') }}
                        </th>
                        <td>
                            {{ $jobExperience->order_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobExperience.fields.company_name') }}
                        </th>
                        <td>
                            {{ $jobExperience->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobExperience.fields.company_role') }}
                        </th>
                        <td>
                            {{ $jobExperience->company_role }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobExperience.fields.job_start_date') }}
                        </th>
                        <td>
                            {{ $jobExperience->job_start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobExperience.fields.job_end_date') }}
                        </th>
                        <td>
                            {{ $jobExperience->job_end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobExperience.fields.job_description') }}
                        </th>
                        <td>
                            {!! $jobExperience->job_description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection