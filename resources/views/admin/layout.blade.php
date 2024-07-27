<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Talenthub</title>
    <link rel="icon" href="https://flowbite.com/docs/images/logo.svg" type="image/svg+xml">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
</head>
<body class="flex h-screen bg-gray-100" x-data="{ sidebarOpen: false }">
    @include('partials.admin.header')

    @include('partials.admin.sidebar')

    <div class="flex-1 flex flex-col sm:ml-64">
        <main class="flex-1 p-6 mt-14">
            @yield('content')
        </main>
        @include('partials.admin.footer')
    </div>
</body>
</html>
