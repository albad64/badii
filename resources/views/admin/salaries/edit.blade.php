@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.salary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.salaries.update", [$salary->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
<<<<<<< HEAD
                <label class="required" for="resource_code_id">{{ trans('cruds.salary.fields.resource_code') }}</label>
                <select class="form-control select2 {{ $errors->has('resource_code') ? 'is-invalid' : '' }}" name="resource_code_id" id="resource_code_id" required>
=======
                <label for="resource_code_id">{{ trans('cruds.salary.fields.resource_code') }}</label>
                <select class="form-control select2 {{ $errors->has('resource_code') ? 'is-invalid' : '' }}" name="resource_code_id" id="resource_code_id">
>>>>>>> quickadminpanel_2020_06_28_07_35_51
                    @foreach($resource_codes as $id => $resource_code)
                        <option value="{{ $id }}" {{ ($salary->resource_code ? $salary->resource_code->id : old('resource_code_id')) == $id ? 'selected' : '' }}>{{ $resource_code }}</option>
                    @endforeach
                </select>
                @if($errors->has('resource_code'))
                    <span class="text-danger">{{ $errors->first('resource_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.resource_code_helper') }}</span>
            </div>
            <div class="form-group">
<<<<<<< HEAD
                <label class="required" for="start_date">{{ trans('cruds.salary.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $salary->start_date) }}" required>
=======
                <label for="start_date">{{ trans('cruds.salary.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $salary->start_date) }}">
>>>>>>> quickadminpanel_2020_06_28_07_35_51
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('remote_job') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="remote_job" value="0">
                    <input class="form-check-input" type="checkbox" name="remote_job" id="remote_job" value="1" {{ $salary->remote_job || old('remote_job', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="remote_job">{{ trans('cruds.salary.fields.remote_job') }}</label>
                </div>
                @if($errors->has('remote_job'))
                    <span class="text-danger">{{ $errors->first('remote_job') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.remote_job_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="work_country_id">{{ trans('cruds.salary.fields.work_country') }}</label>
                <select class="form-control select2 {{ $errors->has('work_country') ? 'is-invalid' : '' }}" name="work_country_id" id="work_country_id">
                    @foreach($work_countries as $id => $work_country)
                        <option value="{{ $id }}" {{ ($salary->work_country ? $salary->work_country->id : old('work_country_id')) == $id ? 'selected' : '' }}>{{ $work_country }}</option>
                    @endforeach
                </select>
                @if($errors->has('work_country'))
                    <span class="text-danger">{{ $errors->first('work_country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.work_country_helper') }}</span>
            </div>
            <div class="form-group">
<<<<<<< HEAD
                <label class="required" for="week_working_string">{{ trans('cruds.salary.fields.week_working_string') }}</label>
                <input class="form-control {{ $errors->has('week_working_string') ? 'is-invalid' : '' }}" type="text" name="week_working_string" id="week_working_string" value="{{ old('week_working_string', $salary->week_working_string) }}" required>
=======
                <label for="week_working_string">{{ trans('cruds.salary.fields.week_working_string') }}</label>
                <input class="form-control {{ $errors->has('week_working_string') ? 'is-invalid' : '' }}" type="text" name="week_working_string" id="week_working_string" value="{{ old('week_working_string', $salary->week_working_string) }}">
>>>>>>> quickadminpanel_2020_06_28_07_35_51
                @if($errors->has('week_working_string'))
                    <span class="text-danger">{{ $errors->first('week_working_string') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.week_working_string_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="currency_id">{{ trans('cruds.salary.fields.currency') }}</label>
                <select class="form-control select2 {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency_id" id="currency_id">
                    @foreach($currencies as $id => $currency)
                        <option value="{{ $id }}" {{ ($salary->currency ? $salary->currency->id : old('currency_id')) == $id ? 'selected' : '' }}>{{ $currency }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <span class="text-danger">{{ $errors->first('currency') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.salary.fields.internal_department') }}</label>
                <select class="form-control {{ $errors->has('internal_department') ? 'is-invalid' : '' }}" name="internal_department" id="internal_department">
                    <option value disabled {{ old('internal_department', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Salary::INTERNAL_DEPARTMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('internal_department', $salary->internal_department) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('internal_department'))
                    <span class="text-danger">{{ $errors->first('internal_department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.internal_department_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.salary.fields.internal_office') }}</label>
                <select class="form-control {{ $errors->has('internal_office') ? 'is-invalid' : '' }}" name="internal_office" id="internal_office">
                    <option value disabled {{ old('internal_office', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Salary::INTERNAL_OFFICE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('internal_office', $salary->internal_office) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('internal_office'))
                    <span class="text-danger">{{ $errors->first('internal_office') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.internal_office_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="annual_base_salary">{{ trans('cruds.salary.fields.annual_base_salary') }}</label>
                <input class="form-control {{ $errors->has('annual_base_salary') ? 'is-invalid' : '' }}" type="number" name="annual_base_salary" id="annual_base_salary" value="{{ old('annual_base_salary', $salary->annual_base_salary) }}" step="0.01">
                @if($errors->has('annual_base_salary'))
                    <span class="text-danger">{{ $errors->first('annual_base_salary') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.annual_base_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vat_daily_fee">{{ trans('cruds.salary.fields.vat_daily_fee') }}</label>
                <input class="form-control {{ $errors->has('vat_daily_fee') ? 'is-invalid' : '' }}" type="number" name="vat_daily_fee" id="vat_daily_fee" value="{{ old('vat_daily_fee', $salary->vat_daily_fee) }}" step="0.01">
                @if($errors->has('vat_daily_fee'))
                    <span class="text-danger">{{ $errors->first('vat_daily_fee') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.vat_daily_fee_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vat_daily_cost">{{ trans('cruds.salary.fields.vat_daily_cost') }}</label>
                <input class="form-control {{ $errors->has('vat_daily_cost') ? 'is-invalid' : '' }}" type="number" name="vat_daily_cost" id="vat_daily_cost" value="{{ old('vat_daily_cost', $salary->vat_daily_cost) }}" step="0.01">
                @if($errors->has('vat_daily_cost'))
                    <span class="text-danger">{{ $errors->first('vat_daily_cost') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.vat_daily_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="staffing_agency_amount">{{ trans('cruds.salary.fields.staffing_agency_amount') }}</label>
                <input class="form-control {{ $errors->has('staffing_agency_amount') ? 'is-invalid' : '' }}" type="number" name="staffing_agency_amount" id="staffing_agency_amount" value="{{ old('staffing_agency_amount', $salary->staffing_agency_amount) }}" step="0.01">
                @if($errors->has('staffing_agency_amount'))
                    <span class="text-danger">{{ $errors->first('staffing_agency_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.staffing_agency_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="staffing_agency_end_date">{{ trans('cruds.salary.fields.staffing_agency_end_date') }}</label>
                <input class="form-control date {{ $errors->has('staffing_agency_end_date') ? 'is-invalid' : '' }}" type="text" name="staffing_agency_end_date" id="staffing_agency_end_date" value="{{ old('staffing_agency_end_date', $salary->staffing_agency_end_date) }}">
                @if($errors->has('staffing_agency_end_date'))
                    <span class="text-danger">{{ $errors->first('staffing_agency_end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.staffing_agency_end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reimb_km">{{ trans('cruds.salary.fields.reimb_km') }}</label>
                <input class="form-control {{ $errors->has('reimb_km') ? 'is-invalid' : '' }}" type="number" name="reimb_km" id="reimb_km" value="{{ old('reimb_km', $salary->reimb_km) }}" step="0.00001">
                @if($errors->has('reimb_km'))
                    <span class="text-danger">{{ $errors->first('reimb_km') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.reimb_km_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('nca') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="nca" value="0">
                    <input class="form-check-input" type="checkbox" name="nca" id="nca" value="1" {{ $salary->nca || old('nca', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="nca">{{ trans('cruds.salary.fields.nca') }}</label>
                </div>
                @if($errors->has('nca'))
                    <span class="text-danger">{{ $errors->first('nca') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.nca_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nca_end_date">{{ trans('cruds.salary.fields.nca_end_date') }}</label>
                <input class="form-control date {{ $errors->has('nca_end_date') ? 'is-invalid' : '' }}" type="text" name="nca_end_date" id="nca_end_date" value="{{ old('nca_end_date', $salary->nca_end_date) }}">
                @if($errors->has('nca_end_date'))
                    <span class="text-danger">{{ $errors->first('nca_end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.nca_end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.salary.fields.nca_frequency') }}</label>
                <select class="form-control {{ $errors->has('nca_frequency') ? 'is-invalid' : '' }}" name="nca_frequency" id="nca_frequency">
                    <option value disabled {{ old('nca_frequency', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Salary::NCA_FREQUENCY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('nca_frequency', $salary->nca_frequency) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('nca_frequency'))
                    <span class="text-danger">{{ $errors->first('nca_frequency') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.nca_frequency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nca_value">{{ trans('cruds.salary.fields.nca_value') }}</label>
                <input class="form-control {{ $errors->has('nca_value') ? 'is-invalid' : '' }}" type="number" name="nca_value" id="nca_value" value="{{ old('nca_value', $salary->nca_value) }}" step="0.01">
                @if($errors->has('nca_value'))
                    <span class="text-danger">{{ $errors->first('nca_value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.nca_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expected_next_lsb_date">{{ trans('cruds.salary.fields.expected_next_lsb_date') }}</label>
                <input class="form-control date {{ $errors->has('expected_next_lsb_date') ? 'is-invalid' : '' }}" type="text" name="expected_next_lsb_date" id="expected_next_lsb_date" value="{{ old('expected_next_lsb_date', $salary->expected_next_lsb_date) }}">
                @if($errors->has('expected_next_lsb_date'))
                    <span class="text-danger">{{ $errors->first('expected_next_lsb_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.expected_next_lsb_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monthly_lsb">{{ trans('cruds.salary.fields.monthly_lsb') }}</label>
                <input class="form-control {{ $errors->has('monthly_lsb') ? 'is-invalid' : '' }}" type="number" name="monthly_lsb" id="monthly_lsb" value="{{ old('monthly_lsb', $salary->monthly_lsb) }}" step="0.01">
                @if($errors->has('monthly_lsb'))
                    <span class="text-danger">{{ $errors->first('monthly_lsb') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.monthly_lsb_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.salary.fields.variable_comp_target') }}</label>
                <select class="form-control {{ $errors->has('variable_comp_target') ? 'is-invalid' : '' }}" name="variable_comp_target" id="variable_comp_target">
                    <option value disabled {{ old('variable_comp_target', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Salary::VARIABLE_COMP_TARGET_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('variable_comp_target', $salary->variable_comp_target) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('variable_comp_target'))
                    <span class="text-danger">{{ $errors->first('variable_comp_target') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.variable_comp_target_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="variable_comp_value">{{ trans('cruds.salary.fields.variable_comp_value') }}</label>
                <input class="form-control {{ $errors->has('variable_comp_value') ? 'is-invalid' : '' }}" type="number" name="variable_comp_value" id="variable_comp_value" value="{{ old('variable_comp_value', $salary->variable_comp_value) }}" step="0.01">
                @if($errors->has('variable_comp_value'))
                    <span class="text-danger">{{ $errors->first('variable_comp_value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.variable_comp_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.salary.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $salary->notes) }}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.notes_helper') }}</span>
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