@extends('user.layout')

@section('content')
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Start of new carousel -->
        <div id="default-carousel" class="relative w-full mb-8 z-0" data-carousel="slide" data-carousel-interval="6000">
            <!-- Carousel wrapper -->
            <div class="relative h-64 overflow-hidden rounded-lg md:h-80 lg:h-96">
                @foreach ($news->take(5) as $index => $newsItem)
                    <div class="{{ $index === 0 ? '' : 'hidden' }} duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('storage/' . $newsItem->image_url) }}" class="absolute block w-full h-full object-cover" alt="{{ $newsItem['title'] }}">
                        <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 w-full p-4">
                            <h2 class="text-white text-lg md:text-xl lg:text-2xl font-bold">{{ $newsItem['title'] }}</h2>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-4 left-1/2 space-x-3 rtl:space-x-reverse">
                @foreach ($news->take(5) as $index => $newsItem)
                    <button type="button" class="w-2.5 h-2.5 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-gray-300' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-3 h-3 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-3 h-3 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        <!-- End of new carousel -->

        <h1 class="text-2xl font-bold mb-4">Berita Terpopuler</h1>
        <div id="news-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($paginatedNews as $newsItem)
                <a href="{{ route('news.detail', $newsItem['id']) }}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 transition-transform transform hover:scale-105">
                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset('storage/' . $newsItem->image_url) }}" alt="{{ $newsItem['title'] }}">
                    <div class="flex flex-col justify-between p-4 leading-normal text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">{{ \Carbon\Carbon::parse($newsItem['date'])->format('F j, Y') }} - {{ $newsItem->category->name }}</p>
                        <h5 class="mb-1 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{ $newsItem['title'] }}</h5>
                    </div>
                </a>
            @endforeach
        </div>
        <div id="pagination" class="mt-8">
            {{ $paginatedNews->links('vendor.pagination.custom') }}
        </div>
    </div>

    <!-- Start of tabs -->
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="editor-choice-tab" data-tabs-target="#editor-choice" type="button" role="tab" aria-controls="editor-choice" aria-selected="true">Feature</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="komunitas-tab" data-tabs-target="#komunitas" type="button" role="tab" aria-controls="komunitas" aria-selected="false">Komunitas</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="opini-tab" data-tabs-target="#opini" type="button" role="tab" aria-controls="opini" aria-selected="false">Opini</button>
            </li>
        </ul>
    </div>
    <div id="default-tab-content">
        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="editor-choice" role="tabpanel" aria-labelledby="editor-choice-tab">
            @if ($editorChoiceMain)
                <div class="mb-4">
                    {{-- <img src="{{ asset('storage/' . $editorChoiceMain->image_url) }}" alt="{{ $editorChoiceMain->title }}" class="w-full h-auto rounded-lg mb-4"> --}}
                    <h2 class="text-xl font-bold">{{ $editorChoiceMain->title }}</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($editorChoiceMain->date)->format('F j, Y') }}</p>
                </div>
            @else
                <div class="mb-4">
                    <h2 class="text-xl font-bold">Belum ada tulisan feature</h2>
                </div>
            @endif
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($editorChoiceNews as $newsItem)
                    <a href="{{ route('news.detail', $newsItem->id) }}" class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $newsItem->image_url) }}" alt="{{ $newsItem->title }}" class="w-16 h-16 rounded-lg">
                        <div>
                            <h3 class="text-md font-semibold">{{ $newsItem->title }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($newsItem->date)->format('F j, Y') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="komunitas" role="tabpanel" aria-labelledby="komunitas-tab">
            @if ($komunitasMain)
                <div class="mb-4">
                    {{-- <img src="{{ asset('storage/' . $komunitasMain->image_url) }}" alt="{{ $komunitasMain->title }}" class="w-full h-auto rounded-lg mb-4"> --}}
                    <h2 class="text-xl font-bold">{{ $komunitasMain->title }}</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($komunitasMain->date)->format('F j, Y') }}</p>
                </div>
            @else
                <div class="mb-4">
                    <h2 class="text-xl font-bold">Belum ada tulisan komunitas</h2>
                </div>
            @endif
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($komunitasNews as $newsItem)
                    <a href="{{ route('news.detail', $newsItem->id) }}" class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $newsItem->image_url) }}" alt="{{ $newsItem->title }}" class="w-16 h-16 rounded-lg">
                        <div>
                            <h3 class="text-md font-semibold">{{ $newsItem->title }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($newsItem->date)->format('F j, Y') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="opini" role="tabpanel" aria-labelledby="opini-tab">
            @if ($opiniMain)
                <div class="mb-4">
                    <!-- Gambar utama dari opini dihilangkan -->
                    {{-- <img src="{{ asset('storage/' . $opiniMain->image_url) }}" alt="{{ $opiniMain->title }}" class="w-full h-auto rounded-lg mb-4"> --}}
                    <h2 class="text-xl font-bold">{{ $opiniMain->title }}</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($opiniMain->date)->format('F j, Y') }}</p>
                </div>
            @else
                <div class="mb-4">
                    <h2 class="text-xl font-bold">Belum ada tulisan opini</h2>
                </div>
            @endif
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($opiniNews as $newsItem)
                    <a href="{{ route('news.detail', $newsItem->id) }}" class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $newsItem->image_url) }}" alt="{{ $newsItem->title }}" class="w-16 h-16 rounded-lg">
                        <div>
                            <h3 class="text-md font-semibold">{{ $newsItem->title }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($newsItem->date)->format('F j, Y') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- End of tabs -->
@endsection
