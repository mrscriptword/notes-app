@extends('layouts.app')

@section('title', 'Catatan')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">📒 Catatan Saya</h1>
            <div class="flex items-center space-x-4">
                <a href="{{ route('notes.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow transition duration-300">
                    + Buat Catatan
                </a>
                <!-- Link untuk catatan daily -->
                <a href="{{ route('notes.daily') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow transition duration-300">
                    Catatan Daily
                </a>
            </div>
        </div>

        @if($notes->isEmpty())
            <div class="text-center text-gray-500 py-10">
                <p class="text-lg">📂 Belum ada catatan yang dibuat.</p>
                <a href="{{ route('notes.create') }}" class="text-blue-500 hover:underline mt-2 inline-block">
                    Tambahkan sekarang
                </a>
            </div>
        @else
            <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6">
                @foreach($notes as $note)
                    <div class="p-6 bg-white shadow-md rounded-lg border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">{{ $note->title }}</h2>
                        <p class="text-gray-600 mt-2">{{ Str::limit($note->content, 120) }}</p>

                        <!-- Menampilkan Role -->
                        <p class="mt-2 text-sm text-gray-500">Role: <span class="font-semibold text-gray-700">{{ ucfirst($note->role) }}</span></p>

                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{ route('notes.show', $note->id) }}" class="text-blue-500 hover:underline flex items-center">
                                🔍 Lihat Detail
                            </a>
                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus catatan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 flex items-center">
                                    🗑 Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
