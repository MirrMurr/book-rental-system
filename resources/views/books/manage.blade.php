@extends('layout')
@section('title', 'Manage books')


<style>

</style>

@section('content')
<div class="manage-books-page">
    <div class="page-header">
        <h1>Book settings</h1>
        <form action="{{route('books.index')}}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary settings-btn large">Done</button>
        </form>
    </div>

    <div class="my-1">
        <a href="{{route('books.create')}}">
            <button class="btn btn-primary large">Add book</button>
        </a>
    </div>

    @component('books.components.list', ['books' => $books, 'genres' => $genres, "edit" => true]) @endcomponent
</div>
@endsection