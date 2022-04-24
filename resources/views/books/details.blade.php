@extends('layout')
@section('title', 'Book details')

@section('content')

<style>
.columns {
  display: flex;
}
.book-cover-container {
    height: 100%;
    max-width: 40%;
    margin-right: 2rem;
}
.book-cover {
    max-height: 100%;
    max-width: 100%;
    border-radius: 14px;
}
.title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.borrow-btn {
    max-height: max-content;
    max-width: max-content;
}

.delete-btn {
    max-height: max-content;
    max-width: max-content;
}

.details {
    width: 60%;
}

.book-info {
    display: grid;
    column-gap: 3rem;
    margin-bottom: 3rem;
    grid-template-columns: 1fr 1fr;
}

.stock-info {
    display: grid;
    column-gap: 3rem;
    grid-template-columns: 1fr 1fr;
}


@media only screen and (max-width: 1400px) {
    .columns {
        display: block;
    }

    .title {
        font-size: 1rem;
    }
}

@media only screen and (max-width: 900px) {
    .title {
        display: block;
    }
    .book-info {
        grid-template-columns: 1fr;
    }

    .stock-info {
        grid-template-columns: 1fr;
    }
}
</style>

{{-- TODO --}}
<?php
$loggedInAsReader = true;
$loggedInAsLibrarian = true;
?>

<div class="card">
    <div class="title">
        <h1>{{ $book['title'] }}</h1>
        <div class="action-buttons">
            @if ($loggedInAsReader)
            <form action="/new-rental" method="POST">
                @csrf
                <input type="hidden" name="bookId" value="{{$book['id']}}" />
                <button type="submit" class="btn btn-primary borrow-btn large">Borrow this book</button>
            </form>
            @endif
            @if ($loggedInAsLibrarian)
            <a href="{{route('books.edit', $book['id'])}}">
                <button type="submit" class="btn btn-secondary borrow-btn large">Edit</button>
            </a>
            <form action="{{route('books.destroy', $book['id'])}}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger book-save-action-btn large">Delete</button>
            </form>
            @endif
        </div>
    </div>

    <div class="columns">
        @if ($book['coverImage'] != null)
        <div class="book-cover-container">
            <img class="book-cover" src="{{$book['coverImage']}}" alt="">
        </div>
        @endif
        <div class="details">
            <div class="book-info">
                <div class="my-1">
                    <h3>Author</h3>
                    <div>{{ $book['authors'] }}</div>
                </div>

                <div class="my-1">
                    <h3>Date of publish</h3>
                    <div>{{ $book['releasedAt'] }}</div>
                </div>

                <div class="my-1">
                    <h3>Number of pages</h3>
                    <div>{{ $book['pages'] }}</div>
                </div>

                <div class="my-1">
                    <h3>Language</h3>
                    <div>{{ $book['languageCode'] }}</div>
                </div>

                <div class="my-1">
                    <h3>ISBN number</h3>
                    <div>{{ $book['isbn'] }}</div>
                </div>
            </div>

            <div class="my-3">
                <h3>Genres</h3>
                @component('genres.components.selector', ['genres' => $book->genres]) @endcomponent
            </div>

            <div class="stock-info">
                <div class="my-1">
                    <h3>Number of this book in the library</h3>
                    <div>{{ $book['inStock'] }}</div>
                </div>

                <div class="my-1">
                    <h3>Number of available books</h3>
                    <div>TODO collect rental table info</div>
                </div>
            </div>

            @if ($loggedInAsReader)
            <div class="my-3">
                <h3>Currently borrowed</h3>
                <div>PLACEHOLDER</div>
            </div>
            @endif
        </div>
    </div>

    <h3>Description</h3>
    <div>{{ $book['description'] }}</div>
</div>
@endsection