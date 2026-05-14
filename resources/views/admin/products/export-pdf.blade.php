<!DOCTYPE html>
<html>

<head>
    <title>Katalog Produk OzaraComp</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3b82f6;
            color: white;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2 style="margin:0;">Dian Computer</h2>
        <p style="margin:5px 0;">Katalog Harga Laptop Terbaru - Laporan Per Tanggal: {{ date('d M Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Brand</th>
                <th>Processor</th>
                <th>RAM</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row['no'] }}</td>
                <td><strong>{{ $row['name'] }}</strong></td>
                <td>{{ $row['brand'] }}</td>
                <td>{{ $row['processor'] }}</td>
                <td>{{ $row['ram'] }}</td>
                <td>{{ $row['price'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak otomatis oleh Sistem OzaraComp Inventory
    </div>
</body>

</html>