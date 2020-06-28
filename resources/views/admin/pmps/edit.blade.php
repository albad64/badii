@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pmp.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pmps.update", [$pmp->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="resource_code_id">{{ trans('cruds.pmp.fields.resource_code') }}</label>
                <select class="form-control select2 {{ $errors->has('resource_code') ? 'is-invalid' : '' }}" name="resource_code_id" id="resource_code_id" required>
                    @foreach($resource_codes as $id => $resource_code)
                        <option value="{{ $id }}" {{ ($pmp->resource_code ? $pmp->resource_code->id : old('resource_code_id')) == $id ? 'selected' : '' }}>{{ $resource_code }}</option>
                    @endforeach
                </select>
                @if($errors->has('resource_code'))
                    <span class="text-danger">{{ $errors->first('resource_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmp.fields.resource_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pmp_year">{{ trans('cruds.pmp.fields.pmp_year') }}</label>
                <input class="form-control {{ $errors->has('pmp_year') ? 'is-invalid' : '' }}" type="number" name="pmp_year" id="pmp_year" value="{{ old('pmp_year', $pmp->pmp_year) }}" step="1" required>
                @if($errors->has('pmp_year'))
                    <span class="text-danger">{{ $errors->first('pmp_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmp.fields.pmp_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="current_grade_id">{{ trans('cruds.pmp.fields.current_grade') }}</label>
                <select class="form-control select2 {{ $errors->has('current_grade') ? 'is-invalid' : '' }}" name="current_grade_id" id="current_grade_id" required>
                    @foreach($current_grades as $id => $current_grade)
                        <option value="{{ $id }}" {{ ($pmp->current_grade ? $pmp->current_grade->id : old('current_grade_id')) == $id ? 'selected' : '' }}>{{ $current_grade }}</option>
                    @endforeach
                </select>
                @if($errors->has('current_grade'))
                    <span class="text-danger">{{ $errors->first('current_grade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmp.fields.current_grade_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="expected_grade_id">{{ trans('cruds.pmp.fields.expected_grade') }}</label>
                <select class="form-control select2 {{ $errors->has('expected_grade') ? 'is-invalid' : '' }}" name="expected_grade_id" id="expected_grade_id" required>
                    @foreach($expected_grades as $id => $expected_grade)
                        <option value="{{ $id }}" {{ ($pmp->expected_grade ? $pmp->expected_grade->id : old('expected_grade_id')) == $id ? 'selected' : '' }}>{{ $expected_grade }}</option>
                    @endforeach
                </select>
                @if($errors->has('expected_grade'))
                    <span class="text-danger">{{ $errors->first('expected_grade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmp.fields.expected_grade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="objective_value">{{ trans('cruds.pmp.fields.objective_value') }}</label>
                <input class="form-control {{ $errors->has('objective_value') ? 'is-invalid' : '' }}" type="number" name="objective_value" id="objective_value" value="{{ old('objective_value', $pmp->objective_value) }}" step="0.01">
                @if($errors->has('objective_value'))
                    <span class="text-danger">{{ $errors->first('objective_value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmp.fields.objective_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="objective_mid_review_date">{{ trans('cruds.pmp.fields.objective_mid_review_date') }}</label>
                <input class="form-control date {{ $errors->has('objective_mid_review_date') ? 'is-invalid' : '' }}" type="text" name="objective_mid_review_date" id="objective_mid_review_date" value="{{ old('objective_mid_review_date', $pmp->objective_mid_review_date) }}">
                @if($errors->has('objective_mid_review_date'))
                    <span class="text-danger">{{ $errors->first('objective_mid_review_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmp.fields.objective_mid_review_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="objective_end_eval_date">{{ trans('cruds.pmp.fields.objective_end_eval_date') }}</label>
                <input class="form-control date {{ $errors->has('objective_end_eval_date') ? 'is-invalid' : '' }}" type="text" name="objective_end_eval_date" id="objective_end_eval_date" value="{{ old('objective_end_eval_date', $pmp->objective_end_eval_date) }}">
                @if($errors->has('objective_end_eval_date'))
                    <span class="text-danger">{{ $errors->first('objective_end_eval_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmp.fields.objective_end_eval_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="overall_mid_year_evaluation">{{ trans('cruds.pmp.fields.overall_mid_year_evaluation') }}</label>
                <input class="form-control {{ $errors->has('overall_mid_year_evaluation') ? 'is-invalid' : '' }}" type="number" name="overall_mid_year_evaluation" id="overall_mid_year_evaluation" value="{{ old('overall_mid_year_evaluation', $pmp->overall_mid_year_evaluation) }}" step="0.01">
                @if($errors->has('overall_mid_year_evaluation'))
                    <span class="text-danger">{{ $errors->first('overall_mid_year_evaluation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmp.fields.overall_mid_year_evaluation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="overall_end_year_evaluation">{{ trans('cruds.pmp.fields.overall_end_year_evaluation') }}</label>
                <input class="form-control {{ $errors->has('overall_end_year_evaluation') ? 'is-invalid' : '' }}" type="number" name="overall_end_year_evaluation" id="overall_end_year_evaluation" value="{{ old('overall_end_year_evaluation', $pmp->overall_end_year_evaluation) }}" step="0.01">
                @if($errors->has('overall_end_year_evaluation'))
                    <span class="text-danger">{{ $errors->first('overall_end_year_evaluation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmp.fields.overall_end_year_evaluation_helper') }}</span>
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