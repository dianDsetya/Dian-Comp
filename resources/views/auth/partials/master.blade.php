<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Update Title --}}
    <title>Login - Dian Computer Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body
    class="bg-[#0f172a] min-h-screen flex items-center justify-center font-sans antialiased overflow-hidden relative selection:bg-blue-500 selection:text-white">

    <div class="absolute inset-0 z-0 bg-black">
        {{-- Ganti Background ke foto Laptop/Tech yang lebih relevan --}}
        <img
            src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=2000&auto=format&fit=crop"
            alt="Background Technology" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-b from-gray-950/40 via-gray-950/80 to-gray-950"></div>
    </div>

    <main class="relative z-10 w-full max-w-md p-6">
        @yield('content')
    </main>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>

</html>