@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-6 py-8">

    <div class="flex space-x-4">
        <!-- Tombol Cek Catatan -->
        <a href="{{ route('notes.index') }}" class="bg-gradient-to-r from-blue-400 to-indigo-500 hover:from-blue-500 hover:to-indigo-600 text-white px-6 py-3 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
            <i class="fas fa-book"></i> Cek Catatan
        </a>
</div>
</div>
@endsection