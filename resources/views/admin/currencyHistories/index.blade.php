@extends('layouts.admin')
@section('content')
@can('currency_history_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.currency-histories.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.currencyHistory.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.currencyHistory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
<<<<<<< HEAD
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-CurrencyHistory">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.currencyHistory.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.currencyHistory.fields.currency') }}
                    </th>
                    <th>
                        {{ trans('cruds.currencyHistory.fields.date_validity') }}
                    </th>
                    <th>
                        {{ trans('cruds.currencyHistory.fields.conversion_rate') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($currencies as $key => $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
=======
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CurrencyHistory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.currencyHistory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.currencyHistory.fields.currency') }}
                        </th>
                        <th>
                            {{ trans('cruds.currencyHistory.fields.date_validity') }}
                        </th>
                        <th>
                            {{ trans('cruds.currencyHistory.fields.conversion_rate') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($currencies as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($currencyHistories as $key => $currencyHistory)
                        <tr data-entry-id="{{ $currencyHistory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $currencyHistory->id ?? '' }}
                            </td>
                            <td>
                                {{ $currencyHistory->currency->code ?? '' }}
                            </td>
                            <td>
                                {{ $currencyHistory->date_validity ?? '' }}
                            </td>
                            <td>
                                {{ $currencyHistory->conversion_rate ?? '' }}
                            </td>
                            <td>
                                @can('currency_history_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.currency-histories.show', $currencyHistory->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('currency_history_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.currency-histories.edit', $currencyHistory->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('currency_history_delete')
                                    <form action="{{ route('admin.currency-histories.destroy', $currencyHistory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
>>>>>>> quickadminpanel_2020_06_28_07_35_51
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('currency_history_delete')
<<<<<<< HEAD
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
=======
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
>>>>>>> quickadminpanel_2020_06_28_07_35_51
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.currency-histories.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
<<<<<<< HEAD
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
=======
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
>>>>>>> quickadminpanel_2020_06_28_07_35_51
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

<<<<<<< HEAD
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.currency-histories.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'currency_code', name: 'currency.code' },
{ data: 'date_validity', name: 'date_validity' },
{ data: 'conversion_rate', name: 'conversion_rate' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-CurrencyHistory').DataTable(dtOverrideGlobals);
=======
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-CurrencyHistory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
>>>>>>> quickadminpanel_2020_06_28_07_35_51
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });
<<<<<<< HEAD
});
=======
})
>>>>>>> quickadminpanel_2020_06_28_07_35_51

</script>
@endsection