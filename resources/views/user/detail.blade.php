@extends('user.layout')

@section('content')
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="max-w-4xl mx-auto">
            <!-- Title Section -->
            <div class="dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
                <h1 class="text-4xl font-bold mb-4 text-gray-900 dark:text-white">{{ $newsItem['title'] }}</h1>
                <div class="flex flex-wrap items-center text-gray-600 dark:text-gray-400 mb-4 space-x-4">
                    <div class="flex items-center text-sm mb-2">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1">
                            <path d="M20 10V7C20 5.89543 19.1046 5 18 5H6C4.89543 5 4 5.89543 4 7V10M20 10V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V10M20 10H4M8 3V7M16 3V7" stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
                            <rect x="6" y="12" width="3" height="3" rx="0.5" fill="#000000"></rect>
                            <rect x="10.5" y="12" width="3" height="3" rx="0.5" fill="#000000"></rect>
                            <rect x="15" y="12" width="3" height="3" rx="0.5" fill="#000000"></rect>
                        </svg>
                        <span>{{ \Carbon\Carbon::parse($newsItem['date'])->format('F j, Y') }}</span>
                    </div>
                    <div class="flex items-center text-sm mb-2">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1">
                            <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span>{{ $newsItem->category->name }}</span>
                    </div>
                    <div class="flex items-center text-sm mb-2">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1">
                            <path d="M15.0007 12C15.0007 13.6569 13.6576 15 12.0007 15C10.3439 15 9.00073 13.6569 9.00073 12C9.00073 10.3431 10.3439 9 12.0007 9C13.6576 9 15.0007 10.3431 15.0007 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M12.0012 5C7.52354 5 3.73326 7.94288 2.45898 12C3.73324 16.0571 7.52354 19 12.0012 19C16.4788 19 20.2691 16.0571 21.5434 12C20.2691 7.94291 16.4788 5 12.0012 5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span>{{$newsItem['views']}} orang</span>
                    </div>
                </div>
                <!-- Image Section -->
                <div class="relative w-full h-96 overflow-hidden rounded-lg shadow-lg mb-4">
                    <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset('storage/' . $newsItem->image_url) }}" alt="{{ $newsItem['title'] }}">
                </div>
                <!-- Image Caption -->
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 text-center">{{ $newsItem['image_caption'] }}</p>
                <!-- Content Section -->
                <div class="prose dark:prose-dark max-w-none">
                    <p class="text-lg text-gray-800 dark:text-gray-300 leading-relaxed">{{ $newsItem['body'] }}</p>
                </div>
            </div>

            <!-- Related News Section -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Related News</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($relatedNews as $related)
                        <a href="{{ route('news.detail', $related['id']) }}" class="flex items-center bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 p-2">
                            <img class="w-16 h-16 object-cover rounded-lg" src="{{ asset('storage/' . $related->image_url) }}" alt="{{ $related['title'] }}">
                            <div class="ml-3">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $related['title'] }}</h3>
                                <p class="text-xs text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($related['date'])->format('F j, Y') }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
