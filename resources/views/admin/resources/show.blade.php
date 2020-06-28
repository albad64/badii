@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.resource.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.resources.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.id') }}
                        </th>
                        <td>
                            {{ $resource->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.resource_code') }}
                        </th>
                        <td>
                            {{ $resource->resource_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.first_name') }}
                        </th>
                        <td>
                            {{ $resource->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.last_name') }}
                        </th>
                        <td>
                            {{ $resource->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.hired_date') }}
                        </th>
                        <td>
                            {{ $resource->hired_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.termination_date') }}
                        </th>
                        <td>
                            {{ $resource->termination_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.status') }}
                        </th>
                        <td>
                            {{ App\Resource::STATUS_SELECT[$resource->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.title') }}
                        </th>
                        <td>
                            {{ App\Resource::TITLE_SELECT[$resource->title] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.photo') }}
                        </th>
                        <td>
                            @if($resource->photo)
                                <a href="{{ $resource->photo->getUrl() }}" target="_blank">
                                    <img src="{{ $resource->photo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Resource::GENDER_SELECT[$resource->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.birth_date') }}
                        </th>
                        <td>
                            {{ $resource->birth_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.birth_city') }}
                        </th>
                        <td>
                            {{ $resource->birth_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.birth_country') }}
                        </th>
                        <td>
                            {{ $resource->birth_country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.nationality') }}
                        </th>
                        <td>
                            {{ App\Resource::NATIONALITY_SELECT[$resource->nationality] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.marital_status') }}
                        </th>
                        <td>
                            {{ App\Resource::MARITAL_STATUS_SELECT[$resource->marital_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.fiscal_code') }}
                        </th>
                        <td>
                            {{ $resource->fiscal_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.vat_number') }}
                        </th>
                        <td>
                            {{ $resource->vat_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.company_partner') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $resource->company_partner ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.protected_categories') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $resource->protected_categories ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.disability_percentage') }}
                        </th>
                        <td>
                            {{ $resource->disability_percentage }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.ice_person') }}
                        </th>
                        <td>
                            {{ $resource->ice_person }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.ice_phone') }}
                        </th>
                        <td>
                            {{ $resource->ice_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.ice_email') }}
                        </th>
                        <td>
                            {{ $resource->ice_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.address_street') }}
                        </th>
                        <td>
                            {{ $resource->address_street }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.address_city') }}
                        </th>
                        <td>
                            {{ $resource->address_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.address_postalcode') }}
                        </th>
                        <td>
                            {{ $resource->address_postalcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.address_country') }}
                        </th>
                        <td>
                            {{ $resource->address_country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.address_state') }}
                        </th>
                        <td>
                            {{ App\Resource::ADDRESS_STATE_SELECT[$resource->address_state] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.work_phone') }}
                        </th>
                        <td>
                            {{ $resource->work_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.home_phone') }}
                        </th>
                        <td>
                            {{ $resource->home_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.office_phone') }}
                        </th>
                        <td>
                            {{ $resource->office_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.home_email') }}
                        </th>
                        <td>
                            {{ $resource->home_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.work_email') }}
                        </th>
                        <td>
                            {{ $resource->work_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resource.fields.other_email') }}
                        </th>
                        <td>
                            {{ $resource->other_email }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.resources.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#resource_code_house_holds" role="tab" data-toggle="tab">
                {{ trans('cruds.houseHold.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#resource_code_contracts" role="tab" data-toggle="tab">
                {{ trans('cruds.contract.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#resource_code_salaries" role="tab" data-toggle="tab">
                {{ trans('cruds.salary.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#resource_code_benefits" role="tab" data-toggle="tab">
                {{ trans('cruds.benefit.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="resource_code_house_holds">
            @includeIf('admin.resources.relationships.resourceCodeHouseHolds', ['houseHolds' => $resource->resourceCodeHouseHolds])
        </div>
        <div class="tab-pane" role="tabpanel" id="resource_code_contracts">
            @includeIf('admin.resources.relationships.resourceCodeContracts', ['contracts' => $resource->resourceCodeContracts])
        </div>
        <div class="tab-pane" role="tabpanel" id="resource_code_salaries">
            @includeIf('admin.resources.relationships.resourceCodeSalaries', ['salaries' => $resource->resourceCodeSalaries])
        </div>
        <div class="tab-pane" role="tabpanel" id="resource_code_benefits">
            @includeIf('admin.resources.relationships.resourceCodeBenefits', ['benefits' => $resource->resourceCodeBenefits])
        </div>
    </div>
</div>

@endsection