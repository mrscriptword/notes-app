@extends('layouts.app')

@section('title', 'Detail Catatan')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $note->title }}</h1>
            <p class="text-gray-600 mt-4">{{ $note->content }}</p>
            <p class="mt-4 text-sm text-gray-500">Role: <span class="font-semibold text-gray-700">{{ ucfirst($note->role) }}</span></p>

            <div class="mt-6 flex justify-between items-center">
                <a href="{{ route('notes.edit', $note->id) }}" class="text-blue-500 hover:underline">Edit</a>
                <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus catatan ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-600">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
