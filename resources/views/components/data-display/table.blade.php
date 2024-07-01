<table {{ $attributes->merge(['class' => 'table datatable-basic']) }}>
    @isset($header)
        <thead class="bg-indigo-600">
            <tr>
                {{ $header }}
            </tr>
        </thead>
    @endisset

    @isset($body)
        <tbody>
            {{ $body }}
        </tbody>
    @endisset

    @isset($footer)
        <tfoot>
            {{ $footer }}
        </tfoot>
    @endisset
</table>
@push('scripts')
    <script>
        $('.datatable-basic').DataTable({
            autoWidth: false,
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
            }
        });
    </script>
@endpush   
