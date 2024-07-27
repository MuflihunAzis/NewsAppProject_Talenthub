@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Pengguna</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ $user->phone_number }}" class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" name="address" id="address" value="{{ $user->address }}" class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="profile_photo" class="block text-sm font-medium text-gray-700">Foto Profil</label>
            <input type="file" name="profile_photo" id="profile_photo" class="mt-1 block w-full">
            @if($user->profile_photo)
                <img src="{{ Storage::url($user->profile_photo) }}" alt="{{ $user->name }}" class="w-20 h-20 mt-2">
            @endif
        </div>
        <div class="mb-4">
            <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role_id" id="role_id" class="mt-1 block w-full">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Simpan</button>
        </div>
    </form>
@endsection
