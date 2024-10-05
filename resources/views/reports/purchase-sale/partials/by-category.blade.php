    <x-data-display.table class="table-striped table-hover">
        <x-slot name="header">
            <tr>
                <th>{{ __('SL') }}</th>
                <th>{{ __('Category Name') }}</th>
                <th>{{ __('Total Quantity Sold') }}</th>
                <th>{{ __('Total Sales Value') }}</th>
                <th>{{ __('Total Profit') }}</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($profitsByCategory as $index => $profit)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $profit->category_name }}</td>
                    <td>{{ number_format($profit->total_quantity_sold) }}</td>
                    <td>{{ number_format($profit->total_sales_value, 2) }}</td>
                    <td>{{ number_format($profit->total_profit, 2) }}</td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-display.table>
