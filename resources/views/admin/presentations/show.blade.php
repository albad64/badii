@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.presentation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.presentations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.presentation.fields.id') }}
                        </th>
                        <td>
                            {{ $presentation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presentation.fields.resource_code') }}
                        </th>
                        <td>
                            {{ $presentation->resource_code->resource_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presentation.fields.order_number') }}
                        </th>
                        <td>
                            {{ $presentation->order_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presentation.fields.event_host') }}
                        </th>
                        <td>
                            {{ $presentation->event_host }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presentation.fields.event_name') }}
                        </th>
                        <td>
                            {{ $presentation->event_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presentation.fields.event_location') }}
                        </th>
                        <td>
                            {{ $presentation->event_location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presentation.fields.event_year') }}
                        </th>
                        <td>
                            {{ $presentation->event_year }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.presentations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection