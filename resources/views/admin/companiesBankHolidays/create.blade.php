@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.companiesBankHoliday.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.companies-bank-holidays.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="company_id">{{ trans('cruds.companiesBankHoliday.fields.company') }}</label>
                <select class="form-control select2 {{ $errors->has('company') ? 'is-invalid' : '' }}" name="company_id" id="company_id" required>
                    @foreach($companies as $id => $company)
                        <option value="{{ $id }}" {{ old('company_id') == $id ? 'selected' : '' }}>{{ $company }}</option>
                    @endforeach
                </select>
                @if($errors->has('company'))
                    <span class="text-danger">{{ $errors->first('company') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.companiesBankHoliday.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="year">{{ trans('cruds.companiesBankHoliday.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="number" name="year" id="year" value="{{ old('year', '') }}" step="1" required>
                @if($errors->has('year'))
                    <span class="text-danger">{{ $errors->first('year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.companiesBankHoliday.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bank_holiday_date">{{ trans('cruds.companiesBankHoliday.fields.bank_holiday_date') }}</label>
                <input class="form-control date {{ $errors->has('bank_holiday_date') ? 'is-invalid' : '' }}" type="text" name="bank_holiday_date" id="bank_holiday_date" value="{{ old('bank_holiday_date') }}" required>
                @if($errors->has('bank_holiday_date'))
                    <span class="text-danger">{{ $errors->first('bank_holiday_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.companiesBankHoliday.fields.bank_holiday_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_holiday_name">{{ trans('cruds.companiesBankHoliday.fields.bank_holiday_name') }}</label>
                <input class="form-control {{ $errors->has('bank_holiday_name') ? 'is-invalid' : '' }}" type="text" name="bank_holiday_name" id="bank_holiday_name" value="{{ old('bank_holiday_name', '') }}">
                @if($errors->has('bank_holiday_name'))
                    <span class="text-danger">{{ $errors->first('bank_holiday_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.companiesBankHoliday.fields.bank_holiday_name_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('bank_holiday_fix') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="bank_holiday_fix" value="0">
                    <input class="form-check-input" type="checkbox" name="bank_holiday_fix" id="bank_holiday_fix" value="1" {{ old('bank_holiday_fix', 0) == 1 || old('bank_holiday_fix') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="bank_holiday_fix">{{ trans('cruds.companiesBankHoliday.fields.bank_holiday_fix') }}</label>
                </div>
                @if($errors->has('bank_holiday_fix'))
                    <span class="text-danger">{{ $errors->first('bank_holiday_fix') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.companiesBankHoliday.fields.bank_holiday_fix_helper') }}</span>
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