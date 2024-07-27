@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Berita</h1>
    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Judul:</label>
            <input type="text" id="title" name="title" class="mt-1 block w-full" value="{{ $news->title }}" required>
        </div>
        <div class="mb-4">
            <label for="body" class="block text-gray-700">Isi Berita:</label>
            <textarea id="body" name="body" class="mt-1 block w-full tinymce-editor" required>{{ $news->body }}</textarea>
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700">Kategori:</label>
            <select id="category_id" name="category_id" class="mt-1 block w-full" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="region_id" class="block text-gray-700">Wilayah:</label>
            <select id="region_id" name="region_id" class="mt-1 block w-full" required>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" {{ $news->region_id == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700">Gambar:</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full">
            <img src="{{ asset('storage/' . $news->image_url) }}" alt="{{ $news->image_caption }}" class="w-16 h-16 object-cover mt-2">
        </div>
        <div class="mb-4">
            <label for="image_caption" class="block text-gray-700">Keterangan Gambar:</label>
            <input type="text" id="image_caption" name="image_caption" class="mt-1 block w-full" value="{{ $news->image_caption }}" required>
        </div>
        <div class="mb-4">
            <label for="date" class="block text-gray-700">Tanggal:</label>
            <input type="date" id="date" name="date" class="mt-1 block w-full" value="{{ $news->date }}" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Simpan</button>
    </form>
@endsection

@section('scripts')
    @vite('resources/js/app.js')
    <script>
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak code insertdatetime media table paste searchreplace fullscreen',
            toolbar_mode: 'floating',
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            images_upload_url: '{{ route('admin.news.upload') }}',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            },
        });
    </script>
@endsection
