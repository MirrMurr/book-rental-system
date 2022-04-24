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
    </div>
        <h3>Filters</h3>
    @component('books.components.search') @endcomponent
    @component('books.components.list', ['books' => $books, 'genres' => $genres, "edit" => false]) @endcomponent
</div>
@endsection