@extends('layout')
@section('title', 'Create book')

@section('content')
<div class="new-book-page card">
    <div class="page-header">
        <h1>New book</h1>
    </div>
    @component('books.components.form', compact('genres')) @endcomponent
</div>
@endsection