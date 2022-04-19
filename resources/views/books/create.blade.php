@extends('layout')
@section('title', 'Create book')

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
</style>

@section('content')
<div class="new-book-page card">
    <div class="page-header">
        <h1>New book</h1>
    </div>
    <form action="/book/create" method="POST">
        @csrf
        <div class="custom-form-item">
            <h4 for="title">Title</h4>
            <input name="title" class="form-item" type="text" />
        </div>
        <div class="custom-form-item">
            <h4 for="author(s)">author(s)</h4>
            <input name="author(s)" class="form-item" type="text" />
        </div>
        <div class="custom-form-item">
            <h4 for="releasedAt">releasedAt</h4>
            <input name="releasedAt" class="form-item" type="text" />
        </div>
        <div class="custom-form-item">
            <h4 for="pages">pages</h4>
            <input name="pages" class="form-item" type="text" />
        </div>
        <div class="custom-form-item">
            <h4 for="isbn">isbn</h4>
            <input name="isbn" class="form-item" type="text" />
        </div>
        <div class="custom-form-item">
            <h4 for="description">description</h4>
            <input name="description" class="form-item" type="text" />
        </div>
        <div class="custom-form-item">
            <h4 for="genres">genres</h4>
            <input name="genres" class="form-item" type="text" />
        </div>
        <div class="custom-form-item">
            <h4 for="inStock">inStock</h4>
            <input name="inStock" class="form-item" type="text" />
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary large book-save-action-btn">Save</button>
            <a href="/manage-books">
                <button class="btn btn-secondary large book-save-action-btn">Cancel</button>
            </a>
        </div>
    </form>
</div>
@endsection