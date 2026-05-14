<!DOCTYPE html>
<html>

<head>
    <title>Print Data Admin</title>
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
        }

        th {
            background: #eee;
        }
    </style>
</head>

<body onload="window.print()">

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
