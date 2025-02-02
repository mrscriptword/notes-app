@extends('layouts.app')

@section('title', 'Buat Catatan Baru')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Judul Halaman -->
    <h1 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
        <span class="mr-3">📝</span> Buat Catatan Baru
    </h1>

    <!-- Tombol Kembali -->
    <a href="{{ route('notes.index') }}" class="inline-flex items-center text-blue-500 hover:text-blue-600 transition-colors duration-300 mb-6">
        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Catatan
    </a>

    <!-- Form Buat Catatan -->
    <form action="{{ route('notes.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-6">
        @csrf

        <!-- Input Judul -->
        <div class="mb-6">
            <label for="title" class="block text-gray-700 font-medium mb-2">Judul</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                value="{{ old('title') }}"
                placeholder="Masukkan judul catatan"
                required
            >
        </div>

        <!-- Input Isi Catatan -->
        <div class="mb-6">
            <label for="content" class="block text-gray-700 font-medium mb-2">Isi Catatan</label>
            <textarea 
                name="content" 
                id="content" 
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                rows="5"
                placeholder="Tulis isi catatan Anda di sini"
                required
            >{{ old('content') }}</textarea>
        </div>

        <!-- Input Role -->
        <div class="mb-6">
            <label for="role" class="block text-gray-700 font-medium mb-2">Role</label>
            <select 
                name="role" 
                id="role" 
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                required
            >
                <option value="daily" {{ old('role') == 'daily' ? 'selected' : '' }}>Daily</option>
                <option value="biasa" {{ old('role') == 'biasa' ? 'selected' : '' }}>Biasa</option>
            </select>
        </div>

        <!-- Tombol Submit -->
        <div class="flex items-center justify-end space-x-4">
            <button 
                type="submit" 
                class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white px-6 py-3 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105"
            >
                <i class="fas fa-save mr-2"></i> Simpan Catatan
            </button>
        </div>
    </form>
</div>
@endsection