{{-- Author: Pablo José Benítez Trujillo --}}
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>{{ __('report.title') }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h1 { color: #8a6d1d; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #d6d6d6; padding: 8px; text-align: left; }
        th { background: #f3efe4; }
        .number { text-align: right; }
        .total { font-weight: bold; }
    </style>
</head>
<body>
    <h1>{{ __('report.title') }}</h1>
    <p>{{ __('report.generated_at') }}: {{ now()->format('Y-m-d H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>{{ __('report.order') }}</th>
                <th>{{ __('report.date') }}</th>
                <th>{{ __('report.customer') }}</th>
                <th>{{ __('report.status') }}</th>
                <th class="number">{{ __('report.total') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($viewData['orders'] as $order)
                <tr>
                    <td>#{{ $order->getId() }}</td>
                    <td>{{ $order->getCreatedAt() }}</td>
                    <td>{{ $order->getUser()->getFirstName() }} {{ $order->getUser()->getLastName() }}</td>
                    <td>{{ __('order.status_'.$order->getStatus()) }}</td>
                    <td class="number">{{ number_format($order->getTotalAmount(), 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">{{ __('report.empty') }}</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr class="total">
                <td colspan="4">{{ __('report.total_sales') }}</td>
                <td class="number">{{ number_format($viewData['totalSales'], 2) }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
