@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salary.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.salaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.id') }}
                        </th>
                        <td>
                            {{ $salary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.resource_code') }}
                        </th>
                        <td>
                            {{ $salary->resource_code->resource_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.start_date') }}
                        </th>
                        <td>
                            {{ $salary->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.remote_job') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $salary->remote_job ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.work_country') }}
                        </th>
                        <td>
                            {{ $salary->work_country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.week_working_string') }}
                        </th>
                        <td>
                            {{ $salary->week_working_string }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.currency') }}
                        </th>
                        <td>
                            {{ $salary->currency->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.internal_department') }}
                        </th>
                        <td>
                            {{ App\Salary::INTERNAL_DEPARTMENT_SELECT[$salary->internal_department] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.internal_office') }}
                        </th>
                        <td>
                            {{ App\Salary::INTERNAL_OFFICE_SELECT[$salary->internal_office] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.annual_base_salary') }}
                        </th>
                        <td>
                            {{ $salary->annual_base_salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.vat_daily_fee') }}
                        </th>
                        <td>
                            {{ $salary->vat_daily_fee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.vat_daily_cost') }}
                        </th>
                        <td>
                            {{ $salary->vat_daily_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.staffing_agency_amount') }}
                        </th>
                        <td>
                            {{ $salary->staffing_agency_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.staffing_agency_end_date') }}
                        </th>
                        <td>
                            {{ $salary->staffing_agency_end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.reimb_km') }}
                        </th>
                        <td>
                            {{ $salary->reimb_km }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.nca') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $salary->nca ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.nca_end_date') }}
                        </th>
                        <td>
                            {{ $salary->nca_end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.nca_frequency') }}
                        </th>
                        <td>
                            {{ App\Salary::NCA_FREQUENCY_SELECT[$salary->nca_frequency] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.nca_value') }}
                        </th>
                        <td>
                            {{ $salary->nca_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.expected_next_lsb_date') }}
                        </th>
                        <td>
                            {{ $salary->expected_next_lsb_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.monthly_lsb') }}
                        </th>
                        <td>
                            {{ $salary->monthly_lsb }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.variable_comp_target') }}
                        </th>
                        <td>
                            {{ App\Salary::VARIABLE_COMP_TARGET_SELECT[$salary->variable_comp_target] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.variable_comp_value') }}
                        </th>
                        <td>
                            {{ $salary->variable_comp_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.notes') }}
                        </th>
                        <td>
                            {{ $salary->notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.salaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection