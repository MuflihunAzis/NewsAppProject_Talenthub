
<h2 class="text-xl text-gray-900 font-bold mb-4">Berita Terpopuler</h2>
<ul>
    @foreach ($popularNews as $news)
        <li class="mb-6 flex items-center space-x-3">
            <img src="{{ asset('storage/' . $news->image_url) }}" alt="{{ $news->image_caption }}" class="w-10 h-10 rounded ring-2 ring-white object-cover flex-shrink-0">
            <div class="flex flex-col">
                <a href="#" class="text-gray-800 hover:text-blue-800 text-sm font-medium leading-tight mb-1">{{ $news->title }}</a>
                <span class="text-xs text-gray-600">{{ $news->date }} - {{ $news->category->name }}</span>
            </div>
        </li>
    @endforeach
</ul>
<h2 class="text-xl text-gray-900 font-bold mt-6 mb-4">Kategori</h2>
<ul>
    @foreach ($categories as $category)
        <li class="mb-2">
            <a href="#" class="text-gray-800 hover:text-blue-800">{{ $category->name }}</a>
        </li>
    @endforeach
</ul>