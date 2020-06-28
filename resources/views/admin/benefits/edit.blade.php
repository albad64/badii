@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.benefit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.benefits.update", [$benefit->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="resource_code_id">{{ trans('cruds.benefit.fields.resource_code') }}</label>
                <select class="form-control select2 {{ $errors->has('resource_code') ? 'is-invalid' : '' }}" name="resource_code_id" id="resource_code_id" required>
                    @foreach($resource_codes as $id => $resource_code)
                        <option value="{{ $id }}" {{ ($benefit->resource_code ? $benefit->resource_code->id : old('resource_code_id')) == $id ? 'selected' : '' }}>{{ $resource_code }}</option>
                    @endforeach
                </select>
                @if($errors->has('resource_code'))
                    <span class="text-danger">{{ $errors->first('resource_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.benefit.fields.resource_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.benefit.fields.benefit_extra_type') }}</label>
                <select class="form-control {{ $errors->has('benefit_extra_type') ? 'is-invalid' : '' }}" name="benefit_extra_type" id="benefit_extra_type">
                    <option value disabled {{ old('benefit_extra_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Benefit::BENEFIT_EXTRA_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('benefit_extra_type', $benefit->benefit_extra_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('benefit_extra_type'))
                    <span class="text-danger">{{ $errors->first('benefit_extra_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.benefit.fields.benefit_extra_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.benefit.fields.benefit_type') }}</label>
                <select class="form-control {{ $errors->has('benefit_type') ? 'is-invalid' : '' }}" name="benefit_type" id="benefit_type">
                    <option value disabled {{ old('benefit_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Benefit::BENEFIT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('benefit_type', $benefit->benefit_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('benefit_type'))
                    <span class="text-danger">{{ $errors->first('benefit_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.benefit.fields.benefit_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="assigned_date">{{ trans('cruds.benefit.fields.assigned_date') }}</label>
                <input class="form-control date {{ $errors->has('assigned_date') ? 'is-invalid' : '' }}" type="text" name="assigned_date" id="assigned_date" value="{{ old('assigned_date', $benefit->assigned_date) }}" required>
                @if($errors->has('assigned_date'))
                    <span class="text-danger">{{ $errors->first('assigned_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.benefit.fields.assigned_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expired_date">{{ trans('cruds.benefit.fields.expired_date') }}</label>
                <input class="form-control date {{ $errors->has('expired_date') ? 'is-invalid' : '' }}" type="text" name="expired_date" id="expired_date" value="{{ old('expired_date', $benefit->expired_date) }}">
                @if($errors->has('expired_date'))
                    <span class="text-danger">{{ $errors->first('expired_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.benefit.fields.expired_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="currency_id">{{ trans('cruds.benefit.fields.currency') }}</label>
                <select class="form-control select2 {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency_id" id="currency_id">
                    @foreach($currencies as $id => $currency)
                        <option value="{{ $id }}" {{ ($benefit->currency ? $benefit->currency->id : old('currency_id')) == $id ? 'selected' : '' }}>{{ $currency }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <span class="text-danger">{{ $errors->first('currency') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.benefit.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_cost">{{ trans('cruds.benefit.fields.total_cost') }}</label>
                <input class="form-control {{ $errors->has('total_cost') ? 'is-invalid' : '' }}" type="number" name="total_cost" id="total_cost" value="{{ old('total_cost', $benefit->total_cost) }}" step="0.01">
                @if($errors->has('total_cost'))
                    <span class="text-danger">{{ $errors->first('total_cost') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.benefit.fields.total_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="optional_value">{{ trans('cruds.benefit.fields.optional_value') }}</label>
                <input class="form-control {{ $errors->has('optional_value') ? 'is-invalid' : '' }}" type="number" name="optional_value" id="optional_value" value="{{ old('optional_value', $benefit->optional_value) }}" step="0.01">
                @if($errors->has('optional_value'))
                    <span class="text-danger">{{ $errors->first('optional_value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.benefit.fields.optional_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fringe_benefit">{{ trans('cruds.benefit.fields.fringe_benefit') }}</label>
                <input class="form-control {{ $errors->has('fringe_benefit') ? 'is-invalid' : '' }}" type="number" name="fringe_benefit" id="fringe_benefit" value="{{ old('fringe_benefit', $benefit->fringe_benefit) }}" step="0.01">
                @if($errors->has('fringe_benefit'))
                    <span class="text-danger">{{ $errors->first('fringe_benefit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.benefit.fields.fringe_benefit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.benefit.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $benefit->notes) !!}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.benefit.fields.notes_helper') }}</span>
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
                xhr.open('POST', '/admin/benefits/ckmedia', true);
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
                data.append('crud_id', {{ $benefit->id ?? 0 }});
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