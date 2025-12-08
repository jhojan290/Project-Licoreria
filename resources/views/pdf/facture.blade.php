<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</title>
    <style>
        body { font-family: sans-serif; color: #333; margin: 0; padding: 0; }
        .header-bg {
            background-color: #1a1a1a; /* Fondo oscuro elegante */
            color: #D4AF37; /* Dorado */
            padding: 30px;
            height: 100px;
        }
        .logo-container { float: left; }
        .invoice-title { float: right; text-align: right; }
        .invoice-title h1 { margin: 0; font-size: 30px; text-transform: uppercase; }
        .clearfix { clear: both; }
        
        .content { padding: 30px; }
        
        .info-table { width: 100%; margin-bottom: 40px; }
        .info-table td { vertical-align: top; }
        
        .client-box {
            background: #f4f4f4;
            padding: 15px;
            border-left: 4px solid #D4AF37;
            border-radius: 4px;
        }
        
        .products-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .products-table th {
            background: #1a1a1a;
            color: white;
            padding: 10px;
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
        }
        .products-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 13px;
        }
        .products-table tr:nth-child(even) { background-color: #f9f9f9; }
        
        .totals-table { width: 40%; float: right; }
        .totals-table td { padding: 5px; text-align: right; }
        .grand-total { font-size: 18px; font-weight: bold; color: #1a1a1a; border-top: 2px solid #D4AF37; }
        
        .footer {
            position: fixed; bottom: 0; left: 0; right: 0;
            text-align: center; font-size: 10px; color: #888;
            padding: 20px; border-top: 1px solid #eee;
        }
    </style>
</head>
<body>

    <div class="header-bg">
        <div class="logo-container">
            <img src="{{ public_path('img/LicUp.png') }}" height="60" alt="LicUp">
        </div>
        <div class="invoice-title">
            <h1>Factura de Venta</h1>
            <p style="font-size: 14px; color: white;">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="content">
        <table class="info-table">
            <tr>
                <td width="50%">
                    <strong>VENDEDOR:</strong><br>
                    LicUp Licorería S.A.S.<br>
                    NIT: 900.123.456<br>
                    Pereira, Colombia<br>
                    contacto@licup.com
                </td>
                <td width="50%">
                    <div class="client-box">
                        <strong>CLIENTE:</strong><br>
                        {{ $order->user->name ?? 'Usuario Invitado' }}<br>
                        {{ $order->identification ?? '' }}<br>
                        {{ $order->address ?? 'Dirección no especificada' }}<br>
                        {{ $order->city ?? '' }}<br>
                        Tel: {{ $order->phone ?? '' }}
                    </div>
                </td>
            </tr>
        </table>

        <table class="products-table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th style="text-align: center;">Cant</th>
                    <th style="text-align: right;">Unitario</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name ?? 'Producto' }}</td>
                    <td style="text-align: center;">{{ $item->quantity }}</td>
                    <td style="text-align: right;">${{ number_format($item->price, 0, ',', '.') }}</td>
                    <td style="text-align: right;">${{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="totals-table">
            <tr>
                <td>Subtotal:</td>
                <td>${{ number_format($order->total, 0, ',', '.') }}</td>
            </tr>
            {{-- Si tienes costo de envío, agrégalo aquí --}}
            {{-- <tr>
                <td>Envío:</td>
                <td>$0</td>
            </tr> --}}
            <tr>
                <td class="grand-total">TOTAL PAGADO:</td>
                <td class="grand-total">${{ number_format($order->total, 0, ',', '.') }}</td>
            </tr>
        </table>
        <div class="clearfix"></div>
    </div>

    <div class="footer">
        Gracias por su compra en LicUp. <br>
        Esta factura se genera por computador y no requiere firma autógrafa.
    </div>

</body>
</html>