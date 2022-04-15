@extends('layout')
@section('title', 'Books')

<?php
$genreUrl = $_GET['v'] ?? ''
?>
@section('content')
<div class="genres-page">
    <div class="page-header">
        <h1>Genres</h1>
        {{-- TOOD if role is librarian --}}
        <form action="/manage-genres" method="GET">
            @csrf
            <button type="submit" class="btn btn-secondary settings-btn large">Manage</button>
        </form>
    </div>
    @component('books.genre-selector', compact('genres'))
    <a class="tag {{ $genreUrl == '' ? 'active' : '' }}" href="/genres">All</a>
    @endcomponent
    @component('books.book-list', compact('books', 'genres')) @endcomponent
</div>
@endsection