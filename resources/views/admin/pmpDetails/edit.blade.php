@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pmpDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pmp-details.update", [$pmpDetail->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="pmp_id">{{ trans('cruds.pmpDetail.fields.pmp') }}</label>
                <select class="form-control select2 {{ $errors->has('pmp') ? 'is-invalid' : '' }}" name="pmp_id" id="pmp_id">
                    @foreach($pmps as $id => $pmp)
                        <option value="{{ $id }}" {{ ($pmpDetail->pmp ? $pmpDetail->pmp->id : old('pmp_id')) == $id ? 'selected' : '' }}>{{ $pmp }}</option>
                    @endforeach
                </select>
                @if($errors->has('pmp'))
                    <span class="text-danger">{{ $errors->first('pmp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmpDetail.fields.pmp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="number_detail">{{ trans('cruds.pmpDetail.fields.number_detail') }}</label>
                <input class="form-control {{ $errors->has('number_detail') ? 'is-invalid' : '' }}" type="number" name="number_detail" id="number_detail" value="{{ old('number_detail', $pmpDetail->number_detail) }}" step="1">
                @if($errors->has('number_detail'))
                    <span class="text-danger">{{ $errors->first('number_detail') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmpDetail.fields.number_detail_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_objective_detail">{{ trans('cruds.pmpDetail.fields.sub_objective_detail') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('sub_objective_detail') ? 'is-invalid' : '' }}" name="sub_objective_detail" id="sub_objective_detail">{!! old('sub_objective_detail', $pmpDetail->sub_objective_detail) !!}</textarea>
                @if($errors->has('sub_objective_detail'))
                    <span class="text-danger">{{ $errors->first('sub_objective_detail') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmpDetail.fields.sub_objective_detail_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="weight">{{ trans('cruds.pmpDetail.fields.weight') }}</label>
                <input class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" type="number" name="weight" id="weight" value="{{ old('weight', $pmpDetail->weight) }}" step="0.01">
                @if($errors->has('weight'))
                    <span class="text-danger">{{ $errors->first('weight') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmpDetail.fields.weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kpi_description">{{ trans('cruds.pmpDetail.fields.kpi_description') }}</label>
                <input class="form-control {{ $errors->has('kpi_description') ? 'is-invalid' : '' }}" type="text" name="kpi_description" id="kpi_description" value="{{ old('kpi_description', $pmpDetail->kpi_description) }}">
                @if($errors->has('kpi_description'))
                    <span class="text-danger">{{ $errors->first('kpi_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmpDetail.fields.kpi_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="target">{{ trans('cruds.pmpDetail.fields.target') }}</label>
                <input class="form-control {{ $errors->has('target') ? 'is-invalid' : '' }}" type="text" name="target" id="target" value="{{ old('target', $pmpDetail->target) }}">
                @if($errors->has('target'))
                    <span class="text-danger">{{ $errors->first('target') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmpDetail.fields.target_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.pmpDetail.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $pmpDetail->notes) !!}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmpDetail.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mid_year_evaluation">{{ trans('cruds.pmpDetail.fields.mid_year_evaluation') }}</label>
                <input class="form-control {{ $errors->has('mid_year_evaluation') ? 'is-invalid' : '' }}" type="number" name="mid_year_evaluation" id="mid_year_evaluation" value="{{ old('mid_year_evaluation', $pmpDetail->mid_year_evaluation) }}" step="0.01">
                @if($errors->has('mid_year_evaluation'))
                    <span class="text-danger">{{ $errors->first('mid_year_evaluation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmpDetail.fields.mid_year_evaluation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mid_year_weight">{{ trans('cruds.pmpDetail.fields.mid_year_weight') }}</label>
                <input class="form-control {{ $errors->has('mid_year_weight') ? 'is-invalid' : '' }}" type="number" name="mid_year_weight" id="mid_year_weight" value="{{ old('mid_year_weight', $pmpDetail->mid_year_weight) }}" step="0.01">
                @if($errors->has('mid_year_weight'))
                    <span class="text-danger">{{ $errors->first('mid_year_weight') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmpDetail.fields.mid_year_weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mid_year_notes">{{ trans('cruds.pmpDetail.fields.mid_year_notes') }}</label>
                <input class="form-control {{ $errors->has('mid_year_notes') ? 'is-invalid' : '' }}" type="text" name="mid_year_notes" id="mid_year_notes" value="{{ old('mid_year_notes', $pmpDetail->mid_year_notes) }}">
                @if($errors->has('mid_year_notes'))
                    <span class="text-danger">{{ $errors->first('mid_year_notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmpDetail.fields.mid_year_notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_year_evaluation">{{ trans('cruds.pmpDetail.fields.end_year_evaluation') }}</label>
                <input class="form-control {{ $errors->has('end_year_evaluation') ? 'is-invalid' : '' }}" type="number" name="end_year_evaluation" id="end_year_evaluation" value="{{ old('end_year_evaluation', $pmpDetail->end_year_evaluation) }}" step="0.01">
                @if($errors->has('end_year_evaluation'))
                    <span class="text-danger">{{ $errors->first('end_year_evaluation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmpDetail.fields.end_year_evaluation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_year_weight">{{ trans('cruds.pmpDetail.fields.end_year_weight') }}</label>
                <input class="form-control {{ $errors->has('end_year_weight') ? 'is-invalid' : '' }}" type="number" name="end_year_weight" id="end_year_weight" value="{{ old('end_year_weight', $pmpDetail->end_year_weight) }}" step="0.01">
                @if($errors->has('end_year_weight'))
                    <span class="text-danger">{{ $errors->first('end_year_weight') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmpDetail.fields.end_year_weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_year_notes">{{ trans('cruds.pmpDetail.fields.end_year_notes') }}</label>
                <input class="form-control {{ $errors->has('end_year_notes') ? 'is-invalid' : '' }}" type="text" name="end_year_notes" id="end_year_notes" value="{{ old('end_year_notes', $pmpDetail->end_year_notes) }}">
                @if($errors->has('end_year_notes'))
                    <span class="text-danger">{{ $errors->first('end_year_notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pmpDetail.fields.end_year_notes_helper') }}</span>
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
                xhr.open('POST', '/admin/pmp-details/ckmedia', true);
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
                data.append('crud_id', {{ $pmpDetail->id ?? 0 }});
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