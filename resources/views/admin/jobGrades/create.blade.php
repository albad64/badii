@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.jobGrade.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.job-grades.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="job_grade_name">{{ trans('cruds.jobGrade.fields.job_grade_name') }}</label>
                <input class="form-control {{ $errors->has('job_grade_name') ? 'is-invalid' : '' }}" type="text" name="job_grade_name" id="job_grade_name" value="{{ old('job_grade_name', '') }}" required>
                @if($errors->has('job_grade_name'))
                    <span class="text-danger">{{ $errors->first('job_grade_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobGrade.fields.job_grade_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.jobGrade.fields.organizational_area') }}</label>
                @foreach(App\JobGrade::ORGANIZATIONAL_AREA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('organizational_area') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="organizational_area_{{ $key }}" name="organizational_area" value="{{ $key }}" {{ old('organizational_area', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="organizational_area_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('organizational_area'))
                    <span class="text-danger">{{ $errors->first('organizational_area') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobGrade.fields.organizational_area_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.jobGrade.fields.job_grade') }}</label>
                <select class="form-control {{ $errors->has('job_grade') ? 'is-invalid' : '' }}" name="job_grade" id="job_grade">
                    <option value disabled {{ old('job_grade', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\JobGrade::JOB_GRADE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('job_grade', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('job_grade'))
                    <span class="text-danger">{{ $errors->first('job_grade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobGrade.fields.job_grade_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.jobGrade.fields.job_level') }}</label>
                <select class="form-control {{ $errors->has('job_level') ? 'is-invalid' : '' }}" name="job_level" id="job_level" required>
                    <option value disabled {{ old('job_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\JobGrade::JOB_LEVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('job_level', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('job_level'))
                    <span class="text-danger">{{ $errors->first('job_level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobGrade.fields.job_level_helper') }}</span>
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