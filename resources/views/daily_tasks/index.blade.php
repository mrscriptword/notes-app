@extends('layouts.app')
@section('title', 'Daily Tasks')
@section('content')
    <h1 class="text-2xl font-bold">Daily Tasks</h1>
    <a href="{{ route('daily-tasks.create') }}" class="btn btn-primary">Tambah Tugas</a>
    <ul class="list-disc mt-4">
        @foreach($tasks as $task)
            <li>{{ $task->task }}</li>
        @endforeach
    </ul>
@endsection