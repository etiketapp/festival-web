<table id="datatable{{ $name ?? null }}" class="table table-lg table-hover table-full" width="100%">
    <thead>
        @if($columns ?? null)
            @foreach(json_decode($columns) as $column)
                @if($column->name == 'actions')
                    <th class="min">{{ $column->translate }}</th>
                @else
                    <th>{{ $column->translate }}</th>
                @endif
            @endforeach
        @endif
    </thead>
    <tbody>
    @yield('tableBody')
    </tbody>
</table>

@push('js')

<script type="text/javascript">
    (function ($) {
        'use strict';
        var datatable = $('#datatable{{ $name ?? null }}').DataTable({
            "aLengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "columnDefs": [{
                "targets": 'searchable',
                "orderable": false,
            }],
            "aaSorting": [],
            "stateSave": true,
            @if(isset($datatable))
            "serverSide": true,
            "processing": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Turkish.json"
            },
            "ajax": "{{ $datatable }}",
            "columns": {!! $columns !!},
            @endif
            @if(isset($order))
            rowReorder: {
                dataSrc: 'order',
                selector: 'tr'
            },
            "order": [[{{ $sort ?? 0 }}, "asc"]]
            @else
            "order": [[{{ $sort ?? 0 }}, "desc"]]
            @endif
        });
        @if(isset($order))
        datatable.on( 'row-reordered', function ( e, details, edit ) {
            var orders = [];
            for ( var i=0; i<details.length ; i++ ) {
                var rowData = datatable.row( details[i].node ).data();
                orders.push({
                    id: rowData['id'],
                    order: details[i].newData
                });
            }

            if (orders.length == 0) {
                return;
            }
            $.ajax({
                method: "POST",
                url: '{{ $order }}',
                data: {'orders': orders}
            }).done(function (json) {
                datatable.draw(false);
                /*
                noty({
                    theme: 'app-noty',
                    type: 'success',
                    layout: 'topRight',
                    text: json.message,
                    timeout: 3000,
                    closeWith: ['button', 'click'],
                    animation: {
                        open: 'noty-animation fadeIn',
                        close: 'noty-animation fadeOut'
                    }
                });*/
            })
        });
        @endif
    })(jQuery);
</script>
@endpush