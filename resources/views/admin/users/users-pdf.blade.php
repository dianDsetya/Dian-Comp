<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: sans-serif;
        }

        h3 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            font-size: 12px;
        }

        th {
            background: #f3f4f6;
        }
    </style>
</head>

<body>

    <h3>Data Admin</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row['no'] }}</td>
                    <td>{{ $row['name'] }}</td>
                    <td>{{ $row['email'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
