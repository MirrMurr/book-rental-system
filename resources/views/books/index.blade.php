@extends('layout')
@section('title', 'Books')


<style>
.settings-btn {
    width: max-content;
    height: max-content;
}
</style>

@section('content')
<div class="books-page">
    <div class="page-header">
        <h1>Books</h1>
        {{-- TOOD if role is librarian --}}
        <form action="/manage-books" method="GET">
            @csrf
            <button type="submit" class="btn btn-secondary settings-btn large">Manage</button>
        </form>
    </div>
        <h3>Filters</h3>
    @component('books.components.search') @endcomponent
    {{-- @component('books.book-list', compact('books', 'genres')) @endcomponent --}}
    @component('books.components.list', ['books' => $books, 'genres' => $genres, "edit" => false]) @endcomponent
</div>
@endsection