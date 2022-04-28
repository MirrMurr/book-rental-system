@extends('layout')
@section('title', 'Books')

<?php
$genreUrl = $_GET['v'] ?? ''
?>
@section('content')
<div class="genres-page">
    <div class="page-header">
        <h1>Genres</h1>
        @can('manage')
        <form action="/manage-genres" method="GET">
            @csrf
            <button type="submit" class="btn btn-secondary settings-btn large">Manage</button>
        </form>
        @endcan
    </div>
    @component('genres.components.selector', compact('genres'))
    <a class="tag {{ $genreUrl == '' ? 'active' : '' }}" href="/genres">All</a>
    @endcomponent
    @component('books.components.list', compact('books', 'genres', 'edit')) @endcomponent
</div>
@endsection