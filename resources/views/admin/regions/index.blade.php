@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Wilayah</h1>
    <div class="mb-4">
        <button onclick="openModal('create-region-modal')" class="inline-block px-6 py-2 text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 focus:bg-blue-700 focus:outline-none">
            Tambah Wilayah
        </button>
    </div>
    <div class="overflow-hidden border border-gray-200 rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200 bg-white">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">No</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Nama</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($regions as $region)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ ++$i }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                        {{ $region->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex justify-center space-x-4">
                        <button onclick="openEditModal('{{ $region->id }}', '{{ $region->name }}')" class="text-blue-600 hover:text-blue-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13.5l-1.5 1.5V15h.5L11.5 13.5H11zM13 6.5l3.5 3.5m2.853-2.854a4.486 4.486 0 00-6.364-6.364L10.5 5.5H5v5.5l1.146 1.146a4.486 4.486 0 006.364 0l4.243-4.243z" />
                            </svg>
                        </button>
                        <form action="{{ route('admin.regions.destroy', $region->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Anda yakin ingin menghapus wilayah ini?');">
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

    <!-- Create Region Modal -->
    <div id="create-region-modal" class="fixed inset-0 hidden bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Tambah Wilayah</h2>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.regions.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nama:</label>
                    <input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nama">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 focus:bg-blue-700 focus:outline-none">Submit</button>
                    <button type="button" onclick="closeModal('create-region-modal')" class="ml-2 bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 focus:bg-gray-700 focus:outline-none">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Region Modal -->
    <div id="edit-region-modal" class="fixed inset-0 hidden bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Edit Wilayah</h2>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="edit-region-form" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nama:</label>
                    <input type="text" name="name" id="edit-region-name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nama">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 focus:bg-blue-700 focus:outline-none">Submit</button>
                    <button type="button" onclick="closeModal('edit-region-modal')" class="ml-2 bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 focus:bg-gray-700 focus:outline-none">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        function openEditModal(id, name) {
            document.getElementById('edit-region-form').action = '/admin/regions/' + id;
            document.getElementById('edit-region-name').value = name;
            openModal('edit-region-modal');
        }
    </script>
@endsection
