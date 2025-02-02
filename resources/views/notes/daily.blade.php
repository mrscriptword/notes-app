@extends('layouts.app')

@section('title', 'Catatan Daily Saya')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Judul Halaman -->
    <h1 class="text-3xl font-bold text-gray-800 mb-8 flex items-center">
        <span class="mr-3">📒</span> Catatan Daily Saya
    </h1>

    <!-- Tombol Kembali -->
    <a href="{{ route('dashboard') }}" class="inline-flex items-center text-blue-500 hover:text-blue-600 transition-colors duration-300 mb-4">
        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
    </a>

    <!-- Menampilkan catatan daily -->
    @if($dailyNotes->isEmpty())
        <p class="text-gray-500">Belum ada catatan daily.</p>
    @else
        <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6">
            @foreach($dailyNotes as $note)
                <div class="p-6 bg-white shadow-lg rounded-lg border border-gray-200 transform transition-all duration-300 hover:scale-105">
                    <!-- Checklist -->
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $note->title }}</h3>
                        <input 
    type="checkbox" 
    id="checkbox-{{ $note->id }}"
    class="form-checkbox h-5 w-5 text-blue-600 rounded focus:ring-blue-500 transition-all duration-300"
    onchange="checkCompletion({{ $note->id }})"
    @if($note->checked_at == today()->toDateString()) checked disabled @endif
>
                    </div>

                    <!-- Konten Catatan (Dibatasi 100 karakter) -->
                    <p class="text-gray-600 mb-4">{{ Str::limit($note->content, 100) }}</p>

                    <!-- Tombol Lihat Detail -->
                    <a href="{{ route('notes.show', $note->id) }}" class="inline-flex items-center text-blue-500 hover:text-blue-600 transition-colors duration-300">
                        <i class="fas fa-eye mr-2"></i> Lihat Detail
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Pesan Selesai -->
        <div id="completionMessage" class="mt-8 p-4 bg-green-50 border border-green-200 text-green-600 rounded-lg hidden">
            🎉 Anda telah selesai melakukan kegiatan ini!
        </div>
    @endif
</div>

<!-- Script untuk Menghandle Checklist -->
<script>
    function checkCompletion(noteId) {
    const checkbox = document.querySelector(`#checkbox-${noteId}`);

    if (!checkbox.checked) {
        return; // Mencegah pengguna mencabut centang
    }

    fetch(`/notes/${noteId}/check-completion`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ checked: true }) 
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            checkbox.disabled = true; // Mencegah perubahan lagi setelah dicentang
        }
    })
    .catch(error => console.error('Error:', error));
}

</script>
@endsection
