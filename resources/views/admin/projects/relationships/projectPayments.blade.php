<div class="card">
    <div class="card-header">
        {{ trans('cruds.payment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-projectPayments">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.payment_orderid') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.donation_num') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.donation') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.payment_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.payment_type') }}
                        </th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $key => $payment)
                        <tr data-entry-id="{{ $payment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $payment->id ?? '' }}
                            </td>
                            <td>
                                {{ $payment->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $payment->project->title ?? '' }}
                            </td>
                            <td>
                                {{ $payment->payment_orderid ?? '' }}
                            </td>
                            <td>
                                {{ $payment->donation_num ?? '' }}
                            </td>
                            <td>
                                {{ $payment->donation ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Payment::PAYMENT_STATUS_RADIO[$payment->payment_status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Payment::PAYMENT_TYPE_RADIO[$payment->payment_type] ?? '' }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 
            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            let table = $('.datatable-projectPayments:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
