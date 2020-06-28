@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.companiesHoliday.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.companies-holidays.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="company_id">{{ trans('cruds.companiesHoliday.fields.company') }}</label>
                <select class="form-control select2 {{ $errors->has('company') ? 'is-invalid' : '' }}" name="company_id" id="company_id" required>
                    @foreach($companies as $id => $company)
                        <option value="{{ $id }}" {{ old('company_id') == $id ? 'selected' : '' }}>{{ $company }}</option>
                    @endforeach
                </select>
                @if($errors->has('company'))
                    <span class="text-danger">{{ $errors->first('company') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.companiesHoliday.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="level">{{ trans('cruds.companiesHoliday.fields.level') }}</label>
                <input class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}" type="number" name="level" id="level" value="{{ old('level', '') }}" step="1">
                @if($errors->has('level'))
                    <span class="text-danger">{{ $errors->first('level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.companiesHoliday.fields.level_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="seniority">{{ trans('cruds.companiesHoliday.fields.seniority') }}</label>
                <input class="form-control {{ $errors->has('seniority') ? 'is-invalid' : '' }}" type="number" name="seniority" id="seniority" value="{{ old('seniority', '') }}" step="1">
                @if($errors->has('seniority'))
                    <span class="text-danger">{{ $errors->first('seniority') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.companiesHoliday.fields.seniority_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="days_for_month">{{ trans('cruds.companiesHoliday.fields.days_for_month') }}</label>
                <input class="form-control {{ $errors->has('days_for_month') ? 'is-invalid' : '' }}" type="number" name="days_for_month" id="days_for_month" value="{{ old('days_for_month', '') }}" step="0.01">
                @if($errors->has('days_for_month'))
                    <span class="text-danger">{{ $errors->first('days_for_month') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.companiesHoliday.fields.days_for_month_helper') }}</span>
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
