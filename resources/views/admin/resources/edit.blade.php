@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.resource.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.resources.update", [$resource->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="resource_code">{{ trans('cruds.resource.fields.resource_code') }}</label>
                <input class="form-control {{ $errors->has('resource_code') ? 'is-invalid' : '' }}" type="text" name="resource_code" id="resource_code" value="{{ old('resource_code', $resource->resource_code) }}" required>
                @if($errors->has('resource_code'))
                    <span class="text-danger">{{ $errors->first('resource_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.resource_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.resource.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $resource->first_name) }}">
                @if($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.resource.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $resource->last_name) }}">
                @if($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="hired_date">{{ trans('cruds.resource.fields.hired_date') }}</label>
                <input class="form-control date {{ $errors->has('hired_date') ? 'is-invalid' : '' }}" type="text" name="hired_date" id="hired_date" value="{{ old('hired_date', $resource->hired_date) }}" required>
                @if($errors->has('hired_date'))
                    <span class="text-danger">{{ $errors->first('hired_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.hired_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="termination_date">{{ trans('cruds.resource.fields.termination_date') }}</label>
                <input class="form-control date {{ $errors->has('termination_date') ? 'is-invalid' : '' }}" type="text" name="termination_date" id="termination_date" value="{{ old('termination_date', $resource->termination_date) }}">
                @if($errors->has('termination_date'))
                    <span class="text-danger">{{ $errors->first('termination_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.termination_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.resource.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Resource::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $resource->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.resource.fields.title') }}</label>
                <select class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="title">
                    <option value disabled {{ old('title', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Resource::TITLE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('title', $resource->title) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.resource.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.resource.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Resource::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', $resource->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birth_date">{{ trans('cruds.resource.fields.birth_date') }}</label>
                <input class="form-control date {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" type="text" name="birth_date" id="birth_date" value="{{ old('birth_date', $resource->birth_date) }}">
                @if($errors->has('birth_date'))
                    <span class="text-danger">{{ $errors->first('birth_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.birth_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birth_city">{{ trans('cruds.resource.fields.birth_city') }}</label>
                <input class="form-control {{ $errors->has('birth_city') ? 'is-invalid' : '' }}" type="text" name="birth_city" id="birth_city" value="{{ old('birth_city', $resource->birth_city) }}">
                @if($errors->has('birth_city'))
                    <span class="text-danger">{{ $errors->first('birth_city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.birth_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birth_country_id">{{ trans('cruds.resource.fields.birth_country') }}</label>
                <select class="form-control select2 {{ $errors->has('birth_country') ? 'is-invalid' : '' }}" name="birth_country_id" id="birth_country_id">
                    @foreach($birth_countries as $id => $birth_country)
                        <option value="{{ $id }}" {{ ($resource->birth_country ? $resource->birth_country->id : old('birth_country_id')) == $id ? 'selected' : '' }}>{{ $birth_country }}</option>
                    @endforeach
                </select>
                @if($errors->has('birth_country'))
                    <span class="text-danger">{{ $errors->first('birth_country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.birth_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.resource.fields.nationality') }}</label>
                <select class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}" name="nationality" id="nationality">
                    <option value disabled {{ old('nationality', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Resource::NATIONALITY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('nationality', $resource->nationality) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('nationality'))
                    <span class="text-danger">{{ $errors->first('nationality') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.nationality_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.resource.fields.marital_status') }}</label>
                <select class="form-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" name="marital_status" id="marital_status">
                    <option value disabled {{ old('marital_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Resource::MARITAL_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('marital_status', $resource->marital_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('marital_status'))
                    <span class="text-danger">{{ $errors->first('marital_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.marital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fiscal_code">{{ trans('cruds.resource.fields.fiscal_code') }}</label>
                <input class="form-control {{ $errors->has('fiscal_code') ? 'is-invalid' : '' }}" type="text" name="fiscal_code" id="fiscal_code" value="{{ old('fiscal_code', $resource->fiscal_code) }}">
                @if($errors->has('fiscal_code'))
                    <span class="text-danger">{{ $errors->first('fiscal_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.fiscal_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vat_number">{{ trans('cruds.resource.fields.vat_number') }}</label>
                <input class="form-control {{ $errors->has('vat_number') ? 'is-invalid' : '' }}" type="text" name="vat_number" id="vat_number" value="{{ old('vat_number', $resource->vat_number) }}">
                @if($errors->has('vat_number'))
                    <span class="text-danger">{{ $errors->first('vat_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.vat_number_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('company_partner') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="company_partner" value="0">
                    <input class="form-check-input" type="checkbox" name="company_partner" id="company_partner" value="1" {{ $resource->company_partner || old('company_partner', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="company_partner">{{ trans('cruds.resource.fields.company_partner') }}</label>
                </div>
                @if($errors->has('company_partner'))
                    <span class="text-danger">{{ $errors->first('company_partner') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.company_partner_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('protected_categories') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="protected_categories" value="0">
                    <input class="form-check-input" type="checkbox" name="protected_categories" id="protected_categories" value="1" {{ $resource->protected_categories || old('protected_categories', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="protected_categories">{{ trans('cruds.resource.fields.protected_categories') }}</label>
                </div>
                @if($errors->has('protected_categories'))
                    <span class="text-danger">{{ $errors->first('protected_categories') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.protected_categories_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disability_percentage">{{ trans('cruds.resource.fields.disability_percentage') }}</label>
                <input class="form-control {{ $errors->has('disability_percentage') ? 'is-invalid' : '' }}" type="number" name="disability_percentage" id="disability_percentage" value="{{ old('disability_percentage', $resource->disability_percentage) }}" step="0.01">
                @if($errors->has('disability_percentage'))
                    <span class="text-danger">{{ $errors->first('disability_percentage') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.disability_percentage_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ice_person">{{ trans('cruds.resource.fields.ice_person') }}</label>
                <input class="form-control {{ $errors->has('ice_person') ? 'is-invalid' : '' }}" type="text" name="ice_person" id="ice_person" value="{{ old('ice_person', $resource->ice_person) }}">
                @if($errors->has('ice_person'))
                    <span class="text-danger">{{ $errors->first('ice_person') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.ice_person_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ice_phone">{{ trans('cruds.resource.fields.ice_phone') }}</label>
                <input class="form-control {{ $errors->has('ice_phone') ? 'is-invalid' : '' }}" type="text" name="ice_phone" id="ice_phone" value="{{ old('ice_phone', $resource->ice_phone) }}">
                @if($errors->has('ice_phone'))
                    <span class="text-danger">{{ $errors->first('ice_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.ice_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ice_email">{{ trans('cruds.resource.fields.ice_email') }}</label>
                <input class="form-control {{ $errors->has('ice_email') ? 'is-invalid' : '' }}" type="email" name="ice_email" id="ice_email" value="{{ old('ice_email', $resource->ice_email) }}">
                @if($errors->has('ice_email'))
                    <span class="text-danger">{{ $errors->first('ice_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.ice_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_street">{{ trans('cruds.resource.fields.address_street') }}</label>
                <input class="form-control {{ $errors->has('address_street') ? 'is-invalid' : '' }}" type="text" name="address_street" id="address_street" value="{{ old('address_street', $resource->address_street) }}">
                @if($errors->has('address_street'))
                    <span class="text-danger">{{ $errors->first('address_street') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.address_street_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_city">{{ trans('cruds.resource.fields.address_city') }}</label>
                <input class="form-control {{ $errors->has('address_city') ? 'is-invalid' : '' }}" type="text" name="address_city" id="address_city" value="{{ old('address_city', $resource->address_city) }}">
                @if($errors->has('address_city'))
                    <span class="text-danger">{{ $errors->first('address_city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.address_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_postalcode">{{ trans('cruds.resource.fields.address_postalcode') }}</label>
                <input class="form-control {{ $errors->has('address_postalcode') ? 'is-invalid' : '' }}" type="text" name="address_postalcode" id="address_postalcode" value="{{ old('address_postalcode', $resource->address_postalcode) }}">
                @if($errors->has('address_postalcode'))
                    <span class="text-danger">{{ $errors->first('address_postalcode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.address_postalcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_country_id">{{ trans('cruds.resource.fields.address_country') }}</label>
                <select class="form-control select2 {{ $errors->has('address_country') ? 'is-invalid' : '' }}" name="address_country_id" id="address_country_id">
                    @foreach($address_countries as $id => $address_country)
                        <option value="{{ $id }}" {{ ($resource->address_country ? $resource->address_country->id : old('address_country_id')) == $id ? 'selected' : '' }}>{{ $address_country }}</option>
                    @endforeach
                </select>
                @if($errors->has('address_country'))
                    <span class="text-danger">{{ $errors->first('address_country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.address_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.resource.fields.address_state') }}</label>
                <select class="form-control {{ $errors->has('address_state') ? 'is-invalid' : '' }}" name="address_state" id="address_state">
                    <option value disabled {{ old('address_state', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Resource::ADDRESS_STATE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('address_state', $resource->address_state) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('address_state'))
                    <span class="text-danger">{{ $errors->first('address_state') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.address_state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="work_phone">{{ trans('cruds.resource.fields.work_phone') }}</label>
                <input class="form-control {{ $errors->has('work_phone') ? 'is-invalid' : '' }}" type="text" name="work_phone" id="work_phone" value="{{ old('work_phone', $resource->work_phone) }}">
                @if($errors->has('work_phone'))
                    <span class="text-danger">{{ $errors->first('work_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.work_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_phone">{{ trans('cruds.resource.fields.home_phone') }}</label>
                <input class="form-control {{ $errors->has('home_phone') ? 'is-invalid' : '' }}" type="text" name="home_phone" id="home_phone" value="{{ old('home_phone', $resource->home_phone) }}">
                @if($errors->has('home_phone'))
                    <span class="text-danger">{{ $errors->first('home_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.home_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="office_phone">{{ trans('cruds.resource.fields.office_phone') }}</label>
                <input class="form-control {{ $errors->has('office_phone') ? 'is-invalid' : '' }}" type="text" name="office_phone" id="office_phone" value="{{ old('office_phone', $resource->office_phone) }}">
                @if($errors->has('office_phone'))
                    <span class="text-danger">{{ $errors->first('office_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.office_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_email">{{ trans('cruds.resource.fields.home_email') }}</label>
                <input class="form-control {{ $errors->has('home_email') ? 'is-invalid' : '' }}" type="text" name="home_email" id="home_email" value="{{ old('home_email', $resource->home_email) }}">
                @if($errors->has('home_email'))
                    <span class="text-danger">{{ $errors->first('home_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.home_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="work_email">{{ trans('cruds.resource.fields.work_email') }}</label>
                <input class="form-control {{ $errors->has('work_email') ? 'is-invalid' : '' }}" type="email" name="work_email" id="work_email" value="{{ old('work_email', $resource->work_email) }}" required>
                @if($errors->has('work_email'))
                    <span class="text-danger">{{ $errors->first('work_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.work_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="other_email">{{ trans('cruds.resource.fields.other_email') }}</label>
                <input class="form-control {{ $errors->has('other_email') ? 'is-invalid' : '' }}" type="text" name="other_email" id="other_email" value="{{ old('other_email', $resource->other_email) }}">
                @if($errors->has('other_email'))
                    <span class="text-danger">{{ $errors->first('other_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.other_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alt_address_street">{{ trans('cruds.resource.fields.alt_address_street') }}</label>
                <input class="form-control {{ $errors->has('alt_address_street') ? 'is-invalid' : '' }}" type="text" name="alt_address_street" id="alt_address_street" value="{{ old('alt_address_street', $resource->alt_address_street) }}">
                @if($errors->has('alt_address_street'))
                    <span class="text-danger">{{ $errors->first('alt_address_street') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.alt_address_street_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alt_address_city">{{ trans('cruds.resource.fields.alt_address_city') }}</label>
                <input class="form-control {{ $errors->has('alt_address_city') ? 'is-invalid' : '' }}" type="text" name="alt_address_city" id="alt_address_city" value="{{ old('alt_address_city', $resource->alt_address_city) }}">
                @if($errors->has('alt_address_city'))
                    <span class="text-danger">{{ $errors->first('alt_address_city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.alt_address_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alt_address_postalcode">{{ trans('cruds.resource.fields.alt_address_postalcode') }}</label>
                <input class="form-control {{ $errors->has('alt_address_postalcode') ? 'is-invalid' : '' }}" type="text" name="alt_address_postalcode" id="alt_address_postalcode" value="{{ old('alt_address_postalcode', $resource->alt_address_postalcode) }}">
                @if($errors->has('alt_address_postalcode'))
                    <span class="text-danger">{{ $errors->first('alt_address_postalcode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.alt_address_postalcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alt_address_country_id">{{ trans('cruds.resource.fields.alt_address_country') }}</label>
                <select class="form-control select2 {{ $errors->has('alt_address_country') ? 'is-invalid' : '' }}" name="alt_address_country_id" id="alt_address_country_id">
                    @foreach($alt_address_countries as $id => $alt_address_country)
                        <option value="{{ $id }}" {{ ($resource->alt_address_country ? $resource->alt_address_country->id : old('alt_address_country_id')) == $id ? 'selected' : '' }}>{{ $alt_address_country }}</option>
                    @endforeach
                </select>
                @if($errors->has('alt_address_country'))
                    <span class="text-danger">{{ $errors->first('alt_address_country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.alt_address_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alt_address_state">{{ trans('cruds.resource.fields.alt_address_state') }}</label>
                <input class="form-control {{ $errors->has('alt_address_state') ? 'is-invalid' : '' }}" type="text" name="alt_address_state" id="alt_address_state" value="{{ old('alt_address_state', $resource->alt_address_state) }}">
                @if($errors->has('alt_address_state'))
                    <span class="text-danger">{{ $errors->first('alt_address_state') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resource.fields.alt_address_state_helper') }}</span>
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
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.resources.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($resource) && $resource->photo)
      var file = {!! json_encode($resource->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $resource->photo->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection