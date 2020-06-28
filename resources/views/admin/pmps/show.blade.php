@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pmp.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pmps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pmp.fields.id') }}
                        </th>
                        <td>
                            {{ $pmp->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmp.fields.resource_code') }}
                        </th>
                        <td>
                            {{ $pmp->resource_code->resource_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmp.fields.pmp_year') }}
                        </th>
                        <td>
                            {{ $pmp->pmp_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmp.fields.current_grade') }}
                        </th>
                        <td>
                            {{ $pmp->current_grade->job_grade_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmp.fields.expected_grade') }}
                        </th>
                        <td>
                            {{ $pmp->expected_grade->job_grade_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmp.fields.objective_value') }}
                        </th>
                        <td>
                            {{ $pmp->objective_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmp.fields.objective_mid_review_date') }}
                        </th>
                        <td>
                            {{ $pmp->objective_mid_review_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmp.fields.objective_end_eval_date') }}
                        </th>
                        <td>
                            {{ $pmp->objective_end_eval_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmp.fields.overall_mid_year_evaluation') }}
                        </th>
                        <td>
                            {{ $pmp->overall_mid_year_evaluation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmp.fields.overall_end_year_evaluation') }}
                        </th>
                        <td>
                            {{ $pmp->overall_end_year_evaluation }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pmps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#pmp_pmp_details" role="tab" data-toggle="tab">
                {{ trans('cruds.pmpDetail.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="pmp_pmp_details">
            @includeIf('admin.pmps.relationships.pmpPmpDetails', ['pmpDetails' => $pmp->pmpPmpDetails])
        </div>
    </div>
</div>

@endsection