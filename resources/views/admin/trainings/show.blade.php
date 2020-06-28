@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.training.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trainings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.id') }}
                        </th>
                        <td>
                            {{ $training->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.resource_code') }}
                        </th>
                        <td>
                            {{ $training->resource_code->resource_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.order_number') }}
                        </th>
                        <td>
                            {{ $training->order_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.training_supplier') }}
                        </th>
                        <td>
                            {{ $training->training_supplier }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.training_location') }}
                        </th>
                        <td>
                            {{ $training->training_location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.training_description') }}
                        </th>
                        <td>
                            {{ $training->training_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.training_year') }}
                        </th>
                        <td>
                            {{ $training->training_year }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trainings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection