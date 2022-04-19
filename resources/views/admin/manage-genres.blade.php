@extends('layout')
@section('title', 'Manage genres')


<style>

</style>

@section('content')
<div class="manage-genres-page">
    <div class="page-header">
        <h1>Genre settings</h1>
        <form action="/genres" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary settings-btn large">Done</button>
        </form>
    </div>

    <div class="my-1">
        <a href="/genre/create">
            <button class="btn btn-primary large">Add genre</button>
        </a>
    </div>

    @component('books.genre-selector', compact('genres')) @endcomponent
</div>
@endsection