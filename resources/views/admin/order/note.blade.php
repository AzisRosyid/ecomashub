<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Note</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .details,
        .products {
            width: 100%;
            margin-bottom: 20px;
        }

        .details td,
        .products td,
        .products th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .products {
            border-collapse: collapse;
        }

        .products th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Order Note</h1>
        <h3>{{ $store->name ?? 'Store Name' }}</h3>
        <p>{{ $store->address ?? 'Store Address' }}</p>
        <button onclick="window.print()"
            style="margin: 10px; padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Print</button>
    </div>

    <table class="details">
        @if (session('message'))
            <div
                style="margin: 20px; padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px;">
                {{ session('message') }}
            </div>
        @endif

        <tr>
            <td><strong>Order Name:</strong> {{ $order->name }}</td>
            <td><strong>Date:</strong> {{ $order->date_start }}</td>
        </tr>
        <tr>
            <td><strong>Status:</strong> {{ $order->status }}</td>
            <td><strong>Down Payment:</strong> Rp{{ number_format($order->down_payment, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Description:</strong> {{ $order->description }}</td>
        </tr>
    </table>

    <h3>Products</h3>
    <table class="products">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach ($details as $index => $detail)
                @php
                    $total = $detail->quantity * $detail->product->price;
                    $grandTotal += $total;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>Rp{{ number_format($detail->product->price, 2, ',', '.') }}</td>
                    <td>Rp{{ number_format($total, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Grand Total</th>
                <th>Rp{{ number_format($grandTotal, 2, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>

    <form action="{{ route('adminOrderSendNote', $order->id) }}" method="POST" style="margin-top: 20px;">
        @csrf
        <label for="email" style="display: block; margin-bottom: 5px;">Send to Email:</label>
        <input type="email" name="email" id="email" placeholder="Enter email address" required
            style="padding: 10px; width: 250px; border: 1px solid #ccc; border-radius: 5px;">
        <button type="submit"
            style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Send</button>
    </form>

</body>

</html>
