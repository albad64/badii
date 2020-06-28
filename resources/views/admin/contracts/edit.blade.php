@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.contract.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contracts.update", [$contract->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="resource_code_id">{{ trans('cruds.contract.fields.resource_code') }}</label>
                <select class="form-control select2 {{ $errors->has('resource_code') ? 'is-invalid' : '' }}" name="resource_code_id" id="resource_code_id" required>
                    @foreach($resource_codes as $id => $resource_code)
                        <option value="{{ $id }}" {{ ($contract->resource_code ? $contract->resource_code->id : old('resource_code_id')) == $id ? 'selected' : '' }}>{{ $resource_code }}</option>
                    @endforeach
                </select>
                @if($errors->has('resource_code'))
                    <span class="text-danger">{{ $errors->first('resource_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.resource_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date">{{ trans('cruds.contract.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $contract->start_date) }}">
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.contract.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $contract->end_date) }}">
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company_id">{{ trans('cruds.contract.fields.company') }}</label>
                <select class="form-control select2 {{ $errors->has('company') ? 'is-invalid' : '' }}" name="company_id" id="company_id">
                    @foreach($companies as $id => $company)
                        <option value="{{ $id }}" {{ ($contract->company ? $contract->company->id : old('company_id')) == $id ? 'selected' : '' }}>{{ $company }}</option>
                    @endforeach
                </select>
                @if($errors->has('company'))
                    <span class="text-danger">{{ $errors->first('company') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.contract.fields.head_office') }}</label>
                <select class="form-control {{ $errors->has('head_office') ? 'is-invalid' : '' }}" name="head_office" id="head_office">
                    <option value disabled {{ old('head_office', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Contract::HEAD_OFFICE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('head_office', $contract->head_office) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('head_office'))
                    <span class="text-danger">{{ $errors->first('head_office') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.head_office_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.contract.fields.contract_type') }}</label>
                <select class="form-control {{ $errors->has('contract_type') ? 'is-invalid' : '' }}" name="contract_type" id="contract_type">
                    <option value disabled {{ old('contract_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Contract::CONTRACT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('contract_type', $contract->contract_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('contract_type'))
                    <span class="text-danger">{{ $errors->first('contract_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.contract_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.contract.fields.contract_duration') }}</label>
                <select class="form-control {{ $errors->has('contract_duration') ? 'is-invalid' : '' }}" name="contract_duration" id="contract_duration">
                    <option value disabled {{ old('contract_duration', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Contract::CONTRACT_DURATION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('contract_duration', $contract->contract_duration) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('contract_duration'))
                    <span class="text-danger">{{ $errors->first('contract_duration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.contract_duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.contract.fields.contract_time') }}</label>
                <select class="form-control {{ $errors->has('contract_time') ? 'is-invalid' : '' }}" name="contract_time" id="contract_time">
                    <option value disabled {{ old('contract_time', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Contract::CONTRACT_TIME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('contract_time', $contract->contract_time) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('contract_time'))
                    <span class="text-danger">{{ $errors->first('contract_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.contract_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.contract.fields.area_type') }}</label>
                <select class="form-control {{ $errors->has('area_type') ? 'is-invalid' : '' }}" name="area_type" id="area_type">
                    <option value disabled {{ old('area_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Contract::AREA_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('area_type', $contract->area_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('area_type'))
                    <span class="text-danger">{{ $errors->first('area_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.area_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="termination_date">{{ trans('cruds.contract.fields.termination_date') }}</label>
                <input class="form-control date {{ $errors->has('termination_date') ? 'is-invalid' : '' }}" type="text" name="termination_date" id="termination_date" value="{{ old('termination_date', $contract->termination_date) }}">
                @if($errors->has('termination_date'))
                    <span class="text-danger">{{ $errors->first('termination_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.termination_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.contract.fields.termination_code') }}</label>
                <select class="form-control {{ $errors->has('termination_code') ? 'is-invalid' : '' }}" name="termination_code" id="termination_code">
                    <option value disabled {{ old('termination_code', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Contract::TERMINATION_CODE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('termination_code', $contract->termination_code) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('termination_code'))
                    <span class="text-danger">{{ $errors->first('termination_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.termination_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="calculation_lps">{{ trans('cruds.contract.fields.calculation_lps') }}</label>
                <input class="form-control {{ $errors->has('calculation_lps') ? 'is-invalid' : '' }}" type="number" name="calculation_lps" id="calculation_lps" value="{{ old('calculation_lps', $contract->calculation_lps) }}" step="0.01">
                @if($errors->has('calculation_lps'))
                    <span class="text-danger">{{ $errors->first('calculation_lps') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.calculation_lps_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.contract.fields.ccnl') }}</label>
                <select class="form-control {{ $errors->has('ccnl') ? 'is-invalid' : '' }}" name="ccnl" id="ccnl">
                    <option value disabled {{ old('ccnl', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Contract::CCNL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('ccnl', $contract->ccnl) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('ccnl'))
                    <span class="text-danger">{{ $errors->first('ccnl') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.ccnl_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.contract.fields.clb_category') }}</label>
                <select class="form-control {{ $errors->has('clb_category') ? 'is-invalid' : '' }}" name="clb_category" id="clb_category">
                    <option value disabled {{ old('clb_category', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Contract::CLB_CATEGORY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('clb_category', $contract->clb_category) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('clb_category'))
                    <span class="text-danger">{{ $errors->first('clb_category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.clb_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.contract.fields.clb_level') }}</label>
                <select class="form-control {{ $errors->has('clb_level') ? 'is-invalid' : '' }}" name="clb_level" id="clb_level">
                    <option value disabled {{ old('clb_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Contract::CLB_LEVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('clb_level', $contract->clb_level) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('clb_level'))
                    <span class="text-danger">{{ $errors->first('clb_level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.clb_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.contract.fields.us_category') }}</label>
                <select class="form-control {{ $errors->has('us_category') ? 'is-invalid' : '' }}" name="us_category" id="us_category">
                    <option value disabled {{ old('us_category', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Contract::US_CATEGORY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('us_category', $contract->us_category) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('us_category'))
                    <span class="text-danger">{{ $errors->first('us_category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.us_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_trial_period_date">{{ trans('cruds.contract.fields.end_trial_period_date') }}</label>
                <input class="form-control date {{ $errors->has('end_trial_period_date') ? 'is-invalid' : '' }}" type="text" name="end_trial_period_date" id="end_trial_period_date" value="{{ old('end_trial_period_date', $contract->end_trial_period_date) }}">
                @if($errors->has('end_trial_period_date'))
                    <span class="text-danger">{{ $errors->first('end_trial_period_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.end_trial_period_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="weekly_working_hours">{{ trans('cruds.contract.fields.weekly_working_hours') }}</label>
                <input class="form-control {{ $errors->has('weekly_working_hours') ? 'is-invalid' : '' }}" type="number" name="weekly_working_hours" id="weekly_working_hours" value="{{ old('weekly_working_hours', $contract->weekly_working_hours) }}" step="1">
                @if($errors->has('weekly_working_hours'))
                    <span class="text-danger">{{ $errors->first('weekly_working_hours') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.weekly_working_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="report_resource_code_id">{{ trans('cruds.contract.fields.report_resource_code') }}</label>
                <select class="form-control select2 {{ $errors->has('report_resource_code') ? 'is-invalid' : '' }}" name="report_resource_code_id" id="report_resource_code_id">
                    @foreach($report_resource_codes as $id => $report_resource_code)
                        <option value="{{ $id }}" {{ ($contract->report_resource_code ? $contract->report_resource_code->id : old('report_resource_code_id')) == $id ? 'selected' : '' }}>{{ $report_resource_code }}</option>
                    @endforeach
                </select>
                @if($errors->has('report_resource_code'))
                    <span class="text-danger">{{ $errors->first('report_resource_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.report_resource_code_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('hr_canteen_charge') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="hr_canteen_charge" value="0">
                    <input class="form-check-input" type="checkbox" name="hr_canteen_charge" id="hr_canteen_charge" value="1" {{ $contract->hr_canteen_charge || old('hr_canteen_charge', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="hr_canteen_charge">{{ trans('cruds.contract.fields.hr_canteen_charge') }}</label>
                </div>
                @if($errors->has('hr_canteen_charge'))
                    <span class="text-danger">{{ $errors->first('hr_canteen_charge') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.hr_canteen_charge_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.contract.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $contract->notes) }}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection