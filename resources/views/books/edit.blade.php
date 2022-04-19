@extends('layout')
@section('title', 'Edit book')

{{--

- *title*, text, required, max. 255 characters
- *authors*, text, required, max. 255 characters
- *released_at*, date, required, date, before now (`before:now`)
- *pages*, number, required, at least 1
- *isbn*, text, required, regex pattern: `/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i`
- *description*, textarea, can be empty
- *genres*, checkboxes, array of ids
- *in_stock*, number, required, at least 0

If the validation fails, show the error messages, and keep the form state. If the validation succeeds, save the book, and redirect the browser back to the main page.

--}}

<style>

.book-save-action-btn {
    width: max-content;
    height: max-content;
}

.action-buttons {
    margin-top: 2rem;
}

.book-form {
    width: 40rem;
    /* margin: 0 auto; */
}

.genre-list {
    max-height: 10rem;
    overflow-y: scroll;
    border: 1px solid lightgray;
    border-radius: 10px;
}

.genre-list > .form-item {
    border: none;
}
</style>

<?php
$loggedInAsReader = true;
$loggedInAsLibrarian = true;
?>

@section('content')
<div class="new-book-page card">
    <div class="page-header">
        <h1>Edit book</h1>
    </div>
    <div class="book-form">
        <form action="{{route('books.update', $book['id'])}}" method="POST">
            @method('PUT')
            @csrf
            <div class="custom-form-item">
                <h4 for="title">Title</h4>
                <input name="title" class="form-item @error('title') is-invalid @enderror" type="text" value="{{ old('title', isset($book) ? $book['title'] : '') }}" />
                @error('title')
                    <div class="input-validation-error">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="custom-form-item">
                <h4 for="authors">Author(s)</h4>
                <input name="authors" class="form-item @error('authors') is-invalid @enderror" type="text" value="{{ old('authors', isset($book) ? $book['authors'] : '') }}" />
                @error('authors')
                    <div class="input-validation-error">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="custom-form-item">
                <h4 for="releasedAt">Release date</h4>
                <input name="releasedAt" class="form-item @error('releasedAt') is-invalid @enderror" type="date" value="{{old('releasedAt', isset($book) ? $book['releasedAt'] : '')}}"/>
                @error('releasedAt')
                    <div class="input-validation-error">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="custom-form-item">
                <h4 for="pages">Pages</h4>
                <input name="pages" class="form-item @error('pages') is-invalid @enderror" type="number" value="{{old('pages', isset($book) ? $book['pages'] : '')}}" />
                @error('pages')
                    <div class="input-validation-error">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="custom-form-item">
                <h4 for="isbn">ISBN</h4>
                <input name="isbn" class="form-item @error('isbn') is-invalid @enderror" type="text" value="{{old('isbn', isset($book) ? $book['isbn'] : '')}}" />
                @error('isbn')
                    <div class="input-validation-error">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="custom-form-item">
                <h4 for="description">Description</h4>
                <textarea name="description" class="form-item @error('description') is-invalid @enderror">{{ old('description', isset($book) ? $book['description'] : '') }}</textarea>
                @error('description')
                    <div class="input-validation-error">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="custom-form-item">
                <h4 for="genres">Genres</h4>
                <div class="genre-list">
                    @foreach ($genres as $genre)
                    <div class="form-item @error('genres') is-invalid @enderror">
                        <input type="checkbox" name="genres[]" value="{{$genre['id']}}" value="genre_{{$genre['id']}}" @if($book->genres->contains($genre['id'])) checked @endif />
                        <label for="genre_{{$genre['id']}}" >{{$genre['name']}}</label>
                    </div>
                    @endforeach
                </div>
                @error('genres')
                    <div class="input-validation-error">
                        Please select genres!
                    </div>
                @enderror
            </div>

            <div class="custom-form-item">
                <h4 for="inStock">In stock</h4>
                <input name="inStock" class="form-item @error('inStock') is-invalid @enderror" type="number" value="{{old('inStock', isset($book) ? $book['inStock'] : '')}}" />
                @error('inStock')
                    <div class="input-validation-error">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="custom-form-item">
                <h4 for="coverImage">Cover image url</h4>
                <input name="coverImage" class="form-item @error('coverImage') is-invalid @enderror" type="url" value={{ old('coverImage', isset($book) ? $book['coverImage'] : '') }} />
                @error('coverImage')
                    <div class="input-validation-error">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="row action-buttons">
                <button type="submit" class="btn btn-primary large book-save-action-btn">Save</button>
                <a href="{{route('manage-books')}}">
                    <button type="button" class="btn btn-secondary large book-save-action-btn">Cancel</button>
                </a>
            </div>
        </form>
        @if ($loggedInAsLibrarian)
        <form action="{{route('books.destroy', $book['id'])}}" method="POST">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger book-save-action-btn large">Delete</button>
        </form>
        @endif
    </div>
</div>
@endsection