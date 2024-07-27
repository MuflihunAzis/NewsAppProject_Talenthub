@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-gradient-to-r from-blue-500 to-blue-700 p-6 rounded-lg shadow-md text-white">
            <h2 class="text-lg font-semibold">Total Berita</h2>
            <p class="text-2xl font-bold mt-2">{{ $totalNews }}</p>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-blue-200">terupdate sat ini</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h1m0-4h-.01M12 1v2m0 16v2m-6.4-1.24l-1.6.93M18.4 18.76l1.6-.93M3 12H1m16 0h2m-4.5 6.09l-1.6-.93m-7.1-.16l-1.6-.93m12.8-4.58l1.6-.93m-7.1-.16l1.6-.93M4.93 4.5L3.33 5.43m14.34-.93l1.6.93" />
                </svg>
            </div>
        </div>
        <div class="bg-gradient-to-r from-green-500 to-green-700 p-6 rounded-lg shadow-md text-white">
            <h2 class="text-lg font-semibold">Total Kategori</h2>
            <p class="text-2xl font-bold mt-2">{{ $totalCategories }}</p>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-green-200">terupdate sat ini</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4m16 0a8 8 0 11-16 0 8 8 0 0116 0z" />
                </svg>
            </div>
        </div>
        <div class="bg-gradient-to-r from-purple-500 to-purple-700 p-6 rounded-lg shadow-md text-white">
            <h2 class="text-lg font-semibold">User Aktif</h2>
            <p class="text-2xl font-bold mt-2">{{ $totalUsers }}</p>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-purple-200">terupdate sat ini</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-1a3 3 0 00-3-3h-4a3 3 0 00-3 3v1h5zM9 12a4 4 0 110-8 4 4 0 010 8z" />
                </svg>
            </div>
        </div>
    </div>
@endsection
