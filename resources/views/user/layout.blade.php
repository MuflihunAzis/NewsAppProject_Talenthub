<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Talenthub</title>
    <link rel="icon" href="https://flowbite.com/docs/images/logo.svg" type="image/svg+xml">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Header -->
    <div class="container mx-auto py-2">
        @include('partials.user.header', ['categories' => $categories])
    </div>

    <div class="container mx-auto py-4">
        <!-- For large screens -->
        <div class="hidden lg:grid grid-cols-12 gap-4">
            <!-- Main Content and Slider -->
            <main class="col-span-9">
                @yield('content')
            </main>

            <!-- Sidebar -->
            <aside class="col-span-3 bg-gray-100 bg-opacity-85 divide-y divide-gray-100 text-gray-900 p-4 h-full rounded-lg shadow-lg">
                @include('partials.user.sidebar', ['popularNews' => $popularNews, 'categories' => $categories])
            </aside>
        </div>

        <!-- For small screens -->
        <div class="lg:hidden grid grid-cols-1 gap-4">
            <!-- Main Content and Slider -->
            <main>
                @yield('content')
            </main>

            <!-- Sidebar -->
            <aside class="col-span-3 bg-gray-100 bg-opacity-85 divide-y divide-gray-100 text-gray-900 p-4 h-full rounded-lg shadow-lg">
                @include('partials.user.sidebar', ['popularNews' => $popularNews, 'categories' => $categories])
            </aside>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.user.footer')
    
    <!-- Import Flowbite script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.5.3/flowbite.min.js"></script>
</body>
</html>
