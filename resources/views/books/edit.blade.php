@extends('layout')
@section('title', 'Edit book')

@section('content')
<div class="new-book-page card">
    <div class="page-header">
        <h1>Edit book</h1>
    </div>
    @component('books.components.form', compact('book', 'genres')) @endcomponent
</div>
@endsection