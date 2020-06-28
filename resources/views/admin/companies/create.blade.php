@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.company.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.companies.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="company">{{ trans('cruds.company.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', '') }}" required>
                @if($errors->has('company'))
                    <span class="text-danger">{{ $errors->first('company') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company_name">{{ trans('cruds.company.fields.company_name') }}</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', '') }}" required>
                @if($errors->has('company_name'))
                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="currency_id">{{ trans('cruds.company.fields.currency') }}</label>
                <select class="form-control select2 {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency_id" id="currency_id" required>
                    @foreach($currencies as $id => $currency)
                        <option value="{{ $id }}" {{ old('currency_id') == $id ? 'selected' : '' }}>{{ $currency }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <span class="text-danger">{{ $errors->first('currency') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="invoice_prefix">{{ trans('cruds.company.fields.invoice_prefix') }}</label>
                <input class="form-control {{ $errors->has('invoice_prefix') ? 'is-invalid' : '' }}" type="text" name="invoice_prefix" id="invoice_prefix" value="{{ old('invoice_prefix', '') }}" required>
                @if($errors->has('invoice_prefix'))
                    <span class="text-danger">{{ $errors->first('invoice_prefix') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.invoice_prefix_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="project_prefix">{{ trans('cruds.company.fields.project_prefix') }}</label>
                <input class="form-control {{ $errors->has('project_prefix') ? 'is-invalid' : '' }}" type="text" name="project_prefix" id="project_prefix" value="{{ old('project_prefix', '') }}" required>
                @if($errors->has('project_prefix'))
                    <span class="text-danger">{{ $errors->first('project_prefix') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.project_prefix_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="legal_working_hours">{{ trans('cruds.company.fields.legal_working_hours') }}</label>
                <input class="form-control {{ $errors->has('legal_working_hours') ? 'is-invalid' : '' }}" type="number" name="legal_working_hours" id="legal_working_hours" value="{{ old('legal_working_hours', '') }}" step="0.01" required>
                @if($errors->has('legal_working_hours'))
                    <span class="text-danger">{{ $errors->first('legal_working_hours') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.legal_working_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monthly_instalments">{{ trans('cruds.company.fields.monthly_instalments') }}</label>
                <input class="form-control {{ $errors->has('monthly_instalments') ? 'is-invalid' : '' }}" type="number" name="monthly_instalments" id="monthly_instalments" value="{{ old('monthly_instalments', '') }}" step="0.01">
                @if($errors->has('monthly_instalments'))
                    <span class="text-danger">{{ $errors->first('monthly_instalments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.monthly_instalments_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="countries">{{ trans('cruds.company.fields.country') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('countries') ? 'is-invalid' : '' }}" name="countries[]" id="countries" multiple>
                    @foreach($countries as $id => $country)
                        <option value="{{ $id }}" {{ in_array($id, old('countries', [])) ? 'selected' : '' }}>{{ $country }}</option>
                    @endforeach
                </select>
                @if($errors->has('countries'))
                    <span class="text-danger">{{ $errors->first('countries') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.country_helper') }}</span>
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