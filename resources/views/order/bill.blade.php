<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
        }
        h1, h2, h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
        .text-right {
            text-align: right;
        }
        .total {
            font-weight: bold;
            font-size: 1.2em;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <h1>Restaurant Name</h1>
        <p>Address: Street, City, ZIP</p>
        <p>Phone: (123) 456-7890</p>
        <hr>

        <!-- Order Details -->
        <h2>Tax Invoice</h2>
        <p><strong>Invoice #:</strong> {{ $order->id }}</p>
        <p><strong>Table:</strong> {{ $order->table->name }}</p>
        <p><strong>Date:</strong> {{ now()->format('Y-m-d') }}</p>

        <!-- Items Table -->
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                <tr>
                    <td>{{ $item->menuItem->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }} Ks</td>
                    <td>{{ number_format($item->quantity * $item->price, 2) }} Ks</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right">Subtotal:</td>
                    <td>{{ number_format($order->total_price, 2) }} Ks</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Tax (2%):</td>
                    <td>{{ number_format($order->taxAmount(), 2) }} Ks</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right total">Total:</td>
                    <td class="total">{{ number_format($order->totalAmount(), 2) }} Ks</td>
                </tr>
            </tfoot>
        </table>

        <!-- Footer -->
        <p class="footer">Thank you for dining with us!</p>
    </div>
    <script>
    window.onload = function () {
        window.print();
    };
</script>
</body>
</html>



