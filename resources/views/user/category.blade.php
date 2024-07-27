@extends('user.layout')

@section('content')
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-3xl font-bold mb-6">{{ ucfirst($category) }}</h1>
        <div id="news-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($paginatedNews as $newsItem)
                <a href="{{ route('news.detail', $newsItem->id) }}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 transition-transform transform hover:scale-105">
                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset('storage/' . $newsItem->image_url) }}" alt="{{ $newsItem->title }}">
                    <div class="flex flex-col justify-between p-4 leading-normal text-center">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1 flex items-center justify-center">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1">
                                <path d="M20 10V7C20 5.89543 19.1046 5 18 5H6C4.89543 5 4 5.89543 4 7V10M20 10V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V10M20 10H4M8 3V7M16 3V7" stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
                                <rect x="6" y="12" width="3" height="3" rx="0.5" fill="#000000"></rect>
                                <rect x="10.5" y="12" width="3" height="3" rx="0.5" fill="#000000"></rect>
                                <rect x="15" y="12" width="3" height="3" rx="0.5" fill="#000000"></rect>
                            </svg>
                            {{ \Carbon\Carbon::parse($newsItem->date)->format('F j, Y') }} - {{ $newsItem->category->name }}
                        </p>
                        <h5 class="mb-1 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{ $newsItem->title }}</h5>
                    </div>
                </a>
            @empty
                <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center py-6">
                    <svg viewBox="0 0 24 24" fill="none" class="w-12 h-12 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 10.5C16 11.3284 15.5523 12 15 12C14.4477 12 14 11.3284 14 10.5C14 9.67157 14.4477 9 15 9C15.5523 9 16 9.67157 16 10.5Z" fill="#1C274C"></path>
                        <path d="M10 10.5C10 11.3284 9.55229 12 9 12C8.44772 12 8 11.3284 8 10.5C8 9.67157 8.44772 9 9 9C9.55229 9 10 9.67157 10 10.5Z" fill="#1C274C"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9426 1.25H12.0574C14.3658 1.24999 16.1748 1.24998 17.5863 1.43975C19.031 1.63399 20.1711 2.03933 21.0659 2.93414C21.9607 3.82895 22.366 4.96897 22.5603 6.41371C22.75 7.82519 22.75 9.63423 22.75 11.9426V12.0574C22.75 14.3658 22.75 16.1748 22.5603 17.5863C22.366 19.031 21.9607 20.1711 21.0659 21.0659C20.1711 21.9607 19.031 22.366 17.5863 22.5603C16.1748 22.75 14.3658 22.75 12.0574 22.75H11.9426C9.63423 22.75 7.82519 22.75 6.41371 22.5603C4.96897 22.366 3.82895 21.9607 2.93414 21.0659C2.03933 20.1711 1.63399 19.031 1.43975 17.5863C1.24998 16.1748 1.24999 14.3658 1.25 12.0574V11.9426C1.24999 9.63423 1.24998 7.82519 1.43975 6.41371C1.63399 4.96897 2.03933 3.82895 2.93414 2.93414C3.82895 2.03933 4.96897 1.63399 6.41371 1.43975C7.82519 1.24998 9.63423 1.24999 11.9426 1.25ZM6.61358 2.92637C5.33517 3.09825 4.56445 3.42514 3.9948 3.9948C3.42514 4.56445 3.09825 5.33517 2.92637 6.61358C2.75159 7.91356 2.75 9.62177 2.75 12C2.75 14.3782 2.75159 16.0864 2.92637 17.3864C3.09825 18.6648 3.42514 19.4355 3.9948 20.0052C4.56445 20.5749 5.33517 20.9018 6.61358 21.0736C7.91356 21.2484 9.62177 21.25 12 21.25C14.3782 21.25 16.0864 21.2484 17.3864 21.0736C18.6648 20.9018 19.4355 20.5749 20.0052 20.0052C20.5749 19.4355 20.9018 18.6648 21.0736 17.3864C21.2484 16.0864 21.25 14.3782 21.25 12C21.25 9.62177 21.2484 7.91356 21.0736 6.61358C20.9018 5.33517 20.5749 4.56445 20.0052 3.9948C19.4355 3.42514 18.6648 3.09825 17.3864 2.92637C16.0864 2.75159 14.3782 2.75 12 2.75C9.62177 2.75 7.91356 2.75159 6.61358 2.92637ZM8.55339 16.3975C9.5258 15.6767 10.715 15.25 12 15.25C13.285 15.25 14.4742 15.6767 15.4466 16.3975C15.7794 16.6441 15.8492 17.1138 15.6025 17.4466C15.3559 17.7794 14.8862 17.8492 14.5534 17.6025C13.825 17.0627 12.9459 16.75 12 16.75C11.0541 16.75 10.175 17.0627 9.44661 17.6025C9.11385 17.8492 8.64413 17.7794 8.39747 17.4466C8.15082 17.1138 8.22062 16.6441 8.55339 16.3975Z" fill="#1C274C"></path>
                    </svg>
                    <p class="text-lg text-gray-500 dark:text-gray-400">Belum ada berita {{ ucfirst($category) }}.</p>
                </div>
            @endforelse
        </div>
        <div id="pagination" class="mt-8">
            {{ $paginatedNews->links('vendor.pagination.custom') }}
        </div>
    </div>
@endsection
