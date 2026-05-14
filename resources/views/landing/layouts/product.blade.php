<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dian Computer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .active-filter {
            border: 2px solid #2563eb !important;
            /* Warna Biru Blue-600 */
            color: #2563eb !important;
            background-color: white !important;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-slate-50 font-sans antialiased">

    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>

</html>