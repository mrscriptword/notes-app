<form action="/notes/{{ $note->id }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $note->title }}" required>
    </div>
    <div>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required>{{ $note->content }}</textarea>
    </div>
    <div>
        <label for="role">Role:</label>
        <select name="role" id="role">
            <option value="biasa" {{ $note->role == 'biasa' ? 'selected' : '' }}>Biasa</option>
            <option value="daily" {{ $note->role == 'daily' ? 'selected' : '' }}>Daily</option>
        </select>
    </div>
    <button type="submit">Update Note</button>
</form>
