<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->get(); // Menampilkan catatan milik user yang login
        return view('notes.index', compact('notes'));
    }
    
    /**
     * Menampilkan form untuk membuat catatan baru.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Menyimpan catatan baru ke database.
     */
   // Menyimpan catatan baru
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'role' => 'required|in:daily,biasa',
    ]);

    // Simpan catatan baru dengan user_id yang sesuai
    Note::create([
        'title' => $request->title,
        'content' => $request->content,
        'role' => $request->role,
        'user_id' => Auth::id(), // Menyimpan user_id dari yang sedang login
    ]);

    return redirect()->route('notes.index')->with('success', 'Catatan berhasil dibuat!');
}

public function checkCompletion(Request $request, $id)
{
    $note = Note::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

    // Jika sudah dicentang hari ini, tidak perlu update lagi
    if ($note->checked_at == today()->toDateString()) {
        return response()->json(['success' => false, 'message' => 'Sudah dicentang hari ini']);
    }

    // Simpan tanggal hari ini saat user mencentang
    if ($request->checked) {
        $note->checked_at = now()->toDateString();
        $note->save();
    }

    return response()->json(['success' => true]);
}




public function show($id)
{
    // Ambil catatan hanya milik user yang login
    $note = Note::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    return view('notes.show', compact('note'));
}

    /**
     * Menampilkan form edit untuk sebuah catatan.
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        return view('notes.edit', compact('note'));
    }

    /**
     * Memperbarui catatan yang sudah ada.
     */
   // Mengupdate catatan
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'role' => 'required|in:daily,biasa',
    ]);

    // Update catatan berdasarkan ID dan pastikan hanya bisa diupdate oleh user yang sesuai
    $note = Note::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

    $note->update([
        'title' => $request->title,
        'content' => $request->content,
        'role' => $request->role,
    ]);

    return redirect()->route('notes.index')->with('success', 'Catatan berhasil diupdate!');
}

    /**
     * Menghapus catatan dari database.
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Catatan berhasil dihapus!');
    }

    public function dailyNotes()
{
    // Ambil catatan dengan role daily untuk user yang sedang login
    $dailyNotes = Note::where('user_id', auth()->id()) // Ambil catatan milik user yang login
                      ->where('role', 'daily') // Filter hanya catatan dengan role 'daily'
                      ->orderBy('created_at', 'desc') // Urutkan berdasarkan tanggal dibuat
                      ->get();

    // Kembalikan view dengan data catatan daily
    return view('notes.daily', compact('dailyNotes'));
}

}
