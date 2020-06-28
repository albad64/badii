@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.jobExperience.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.job-experiences.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="resource_code_id">{{ trans('cruds.jobExperience.fields.resource_code') }}</label>
                <select class="form-control select2 {{ $errors->has('resource_code') ? 'is-invalid' : '' }}" name="resource_code_id" id="resource_code_id" required>
                    @foreach($resource_codes as $id => $resource_code)
                        <option value="{{ $id }}" {{ old('resource_code_id') == $id ? 'selected' : '' }}>{{ $resource_code }}</option>
                    @endforeach
                </select>
                @if($errors->has('resource_code'))
                    <span class="text-danger">{{ $errors->first('resource_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobExperience.fields.resource_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="order_number">{{ trans('cruds.jobExperience.fields.order_number') }}</label>
                <input class="form-control {{ $errors->has('order_number') ? 'is-invalid' : '' }}" type="number" name="order_number" id="order_number" value="{{ old('order_number', '') }}" step="1" required>
                @if($errors->has('order_number'))
                    <span class="text-danger">{{ $errors->first('order_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobExperience.fields.order_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company_name">{{ trans('cruds.jobExperience.fields.company_name') }}</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', '') }}" required>
                @if($errors->has('company_name'))
                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobExperience.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company_role">{{ trans('cruds.jobExperience.fields.company_role') }}</label>
                <input class="form-control {{ $errors->has('company_role') ? 'is-invalid' : '' }}" type="text" name="company_role" id="company_role" value="{{ old('company_role', '') }}">
                @if($errors->has('company_role'))
                    <span class="text-danger">{{ $errors->first('company_role') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobExperience.fields.company_role_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job_start_date">{{ trans('cruds.jobExperience.fields.job_start_date') }}</label>
                <input class="form-control date {{ $errors->has('job_start_date') ? 'is-invalid' : '' }}" type="text" name="job_start_date" id="job_start_date" value="{{ old('job_start_date') }}">
                @if($errors->has('job_start_date'))
                    <span class="text-danger">{{ $errors->first('job_start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobExperience.fields.job_start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job_end_date">{{ trans('cruds.jobExperience.fields.job_end_date') }}</label>
                <input class="form-control date {{ $errors->has('job_end_date') ? 'is-invalid' : '' }}" type="text" name="job_end_date" id="job_end_date" value="{{ old('job_end_date') }}">
                @if($errors->has('job_end_date'))
                    <span class="text-danger">{{ $errors->first('job_end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobExperience.fields.job_end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job_description">{{ trans('cruds.jobExperience.fields.job_description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('job_description') ? 'is-invalid' : '' }}" name="job_description" id="job_description">{!! old('job_description') !!}</textarea>
                @if($errors->has('job_description'))
                    <span class="text-danger">{{ $errors->first('job_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobExperience.fields.job_description_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/job-experiences/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $jobExperience->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection