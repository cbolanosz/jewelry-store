{{-- Author: Pablo José Benítez Trujillo --}}
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="application/vnd.ms-excel; charset=UTF-8">
    <title>{{ __('report.title') }}</title>
</head>
<body>
    <table>
        <tr>
            <th>{{ __('report.order') }}</th>
            <th>{{ __('report.date') }}</th>
            <th>{{ __('report.customer') }}</th>
            <th>{{ __('report.status') }}</th>
            <th>{{ __('report.total') }}</th>
        </tr>
        @forelse ($viewData['orders'] as $order)
            <tr>
                <td>#{{ $order->getId() }}</td>
                <td>{{ $order->getCreatedAt() }}</td>
                <td>{{ $order->getUser()->getFirstName() }} {{ $order->getUser()->getLastName() }}</td>
                <td>{{ __('order.status_'.$order->getStatus()) }}</td>
                <td>{{ number_format($order->getTotalAmount(), 2) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">{{ __('report.empty') }}</td>
            </tr>
        @endforelse
        <tr>
            <th colspan="4">{{ __('report.total_sales') }}</th>
            <th>{{ number_format($viewData['totalSales'], 2) }}</th>
        </tr>
    </table>
</body>
</html>
