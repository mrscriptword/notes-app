@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">👤 Edit Profile</h1>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
                class="w-full border border-gray-300 rounded-lg px-4 py-2">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
                class="w-full border border-gray-300 rounded-lg px-4 py-2">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
            💾 Simpan Perubahan
        </button>
    </form>
</div>
@endsection
