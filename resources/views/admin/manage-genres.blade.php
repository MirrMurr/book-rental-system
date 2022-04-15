@extends('layout')
@section('title', 'Manage genres')


<style>

</style>

@section('content')
<div class="manage-genres-page">
    <div class="page-header">
        <h1>Genre settings</h1>
        <form action="/manage-genres" method="GET">
            @csrf
            <button type="submit" class="btn btn-secondary settings-btn large">Manage</button>
        </form>
    </div>
    @component('books.genre-selector', compact('genres')) @endcomponent
</div>
@endsection