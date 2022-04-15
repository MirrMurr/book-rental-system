@extends('layout')
@section('title', 'Manage books')


<style>

</style>

@section('content')
<div class="manage-books-page">
    <div class="page-header">
        <h1>Book settings</h1>
        <form action="/manage-books" method="GET">
            @csrf
            <button type="submit" class="btn btn-secondary settings-btn large">Manage</button>
        </form>
    </div>
    @component('books.book-list', compact('books', 'genres')) @endcomponent
</div>
@endsection