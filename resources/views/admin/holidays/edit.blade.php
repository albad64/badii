@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.holiday.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.holidays.update", [$holiday->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="resource_code_id">{{ trans('cruds.holiday.fields.resource_code') }}</label>
                <select class="form-control select2 {{ $errors->has('resource_code') ? 'is-invalid' : '' }}" name="resource_code_id" id="resource_code_id" required>
                    @foreach($resource_codes as $id => $resource_code)
                        <option value="{{ $id }}" {{ ($holiday->resource_code ? $holiday->resource_code->id : old('resource_code_id')) == $id ? 'selected' : '' }}>{{ $resource_code }}</option>
                    @endforeach
                </select>
                @if($errors->has('resource_code'))
                    <span class="text-danger">{{ $errors->first('resource_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holiday.fields.resource_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.holiday.fields.holidays_type') }}</label>
                <select class="form-control {{ $errors->has('holidays_type') ? 'is-invalid' : '' }}" name="holidays_type" id="holidays_type" required>
                    <option value disabled {{ old('holidays_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Holiday::HOLIDAYS_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('holidays_type', $holiday->holidays_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('holidays_type'))
                    <span class="text-danger">{{ $errors->first('holidays_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holiday.fields.holidays_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="holiday_year">{{ trans('cruds.holiday.fields.holiday_year') }}</label>
                <input class="form-control {{ $errors->has('holiday_year') ? 'is-invalid' : '' }}" type="number" name="holiday_year" id="holiday_year" value="{{ old('holiday_year', $holiday->holiday_year) }}" step="1" required>
                @if($errors->has('holiday_year'))
                    <span class="text-danger">{{ $errors->first('holiday_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holiday.fields.holiday_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="holiday_month">{{ trans('cruds.holiday.fields.holiday_month') }}</label>
                <input class="form-control {{ $errors->has('holiday_month') ? 'is-invalid' : '' }}" type="number" name="holiday_month" id="holiday_month" value="{{ old('holiday_month', $holiday->holiday_month) }}" step="1" required>
                @if($errors->has('holiday_month'))
                    <span class="text-danger">{{ $errors->first('holiday_month') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holiday.fields.holiday_month_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="holiday_residual">{{ trans('cruds.holiday.fields.holiday_residual') }}</label>
                <input class="form-control {{ $errors->has('holiday_residual') ? 'is-invalid' : '' }}" type="number" name="holiday_residual" id="holiday_residual" value="{{ old('holiday_residual', $holiday->holiday_residual) }}" step="0.01">
                @if($errors->has('holiday_residual'))
                    <span class="text-danger">{{ $errors->first('holiday_residual') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holiday.fields.holiday_residual_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="holiday_actual">{{ trans('cruds.holiday.fields.holiday_actual') }}</label>
                <input class="form-control {{ $errors->has('holiday_actual') ? 'is-invalid' : '' }}" type="number" name="holiday_actual" id="holiday_actual" value="{{ old('holiday_actual', $holiday->holiday_actual) }}" step="0.01">
                @if($errors->has('holiday_actual'))
                    <span class="text-danger">{{ $errors->first('holiday_actual') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holiday.fields.holiday_actual_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="holiday_enjoyed">{{ trans('cruds.holiday.fields.holiday_enjoyed') }}</label>
                <input class="form-control {{ $errors->has('holiday_enjoyed') ? 'is-invalid' : '' }}" type="number" name="holiday_enjoyed" id="holiday_enjoyed" value="{{ old('holiday_enjoyed', $holiday->holiday_enjoyed) }}" step="0.01">
                @if($errors->has('holiday_enjoyed'))
                    <span class="text-danger">{{ $errors->first('holiday_enjoyed') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holiday.fields.holiday_enjoyed_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.holiday.fields.status') }}</label>
                @foreach(App\Holiday::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $holiday->status) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.holiday.fields.status_helper') }}</span>
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