@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contract.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contracts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.id') }}
                        </th>
                        <td>
                            {{ $contract->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.resource_code') }}
                        </th>
                        <td>
                            {{ $contract->resource_code->resource_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.start_date') }}
                        </th>
                        <td>
                            {{ $contract->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.end_date') }}
                        </th>
                        <td>
                            {{ $contract->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.company') }}
                        </th>
                        <td>
                            {{ $contract->company->company ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.head_office') }}
                        </th>
                        <td>
                            {{ App\Contract::HEAD_OFFICE_SELECT[$contract->head_office] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.contract_type') }}
                        </th>
                        <td>
                            {{ App\Contract::CONTRACT_TYPE_SELECT[$contract->contract_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.contract_duration') }}
                        </th>
                        <td>
                            {{ App\Contract::CONTRACT_DURATION_SELECT[$contract->contract_duration] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.contract_time') }}
                        </th>
                        <td>
                            {{ App\Contract::CONTRACT_TIME_SELECT[$contract->contract_time] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.area_type') }}
                        </th>
                        <td>
                            {{ App\Contract::AREA_TYPE_SELECT[$contract->area_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.termination_date') }}
                        </th>
                        <td>
                            {{ $contract->termination_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.termination_code') }}
                        </th>
                        <td>
                            {{ App\Contract::TERMINATION_CODE_SELECT[$contract->termination_code] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.calculation_lps') }}
                        </th>
                        <td>
                            {{ $contract->calculation_lps }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.ccnl') }}
                        </th>
                        <td>
                            {{ App\Contract::CCNL_SELECT[$contract->ccnl] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.clb_category') }}
                        </th>
                        <td>
                            {{ App\Contract::CLB_CATEGORY_SELECT[$contract->clb_category] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.clb_level') }}
                        </th>
                        <td>
                            {{ App\Contract::CLB_LEVEL_SELECT[$contract->clb_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.us_category') }}
                        </th>
                        <td>
                            {{ App\Contract::US_CATEGORY_SELECT[$contract->us_category] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.end_trial_period_date') }}
                        </th>
                        <td>
                            {{ $contract->end_trial_period_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.weekly_working_hours') }}
                        </th>
                        <td>
                            {{ $contract->weekly_working_hours }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.report_resource_code') }}
                        </th>
                        <td>
                            {{ $contract->report_resource_code->resource_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.hr_canteen_charge') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $contract->hr_canteen_charge ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.notes') }}
                        </th>
                        <td>
                            {{ $contract->notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contracts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection