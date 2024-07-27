@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Berita</h1>
    <div class="mb-4">
        <a href="{{ route('admin.news.create') }}" class="inline-block px-6 py-2 text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 focus:bg-blue-700 focus:outline-none">
            Tambah Berita
        </a>
    </div>
    <div class="overflow-hidden border border-gray-200 rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200 bg-white">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Gambar</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Judul</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Kategori</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Tanggal</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Wilayah</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Dilihat</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($news as $newsItem)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <img src="{{ asset('storage/' . $newsItem->image_url) }}" alt="{{ $newsItem->image_caption }}" class="w-10 h-10 rounded-full object-cover mx-auto">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                        {{ $newsItem->title }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                        {{ $newsItem->category->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                        {{ $newsItem->date }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                        {{ $newsItem->region->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                        {{ $newsItem->views }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex justify-center space-x-4">
                        <a href="{{ route('admin.news.edit', $newsItem->id) }}" class="text-blue-600 hover:text-blue-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13.5l-1.5 1.5V15h.5L11.5 13.5H11zM13 6.5l3.5 3.5m2.853-2.854a4.486 4.486 0 00-6.364-6.364L10.5 5.5H5v5.5l1.146 1.146a4.486 4.486 0 006.364 0l4.243-4.243z" />
                            </svg>
                        </a>
                        <form action="{{ route('admin.news.destroy', $newsItem->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Anda yakin ingin menghapus berita ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $news->links() }}
    </div>
@endsection
