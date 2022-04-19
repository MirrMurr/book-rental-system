@extends('layout')
@section('title', 'Manage genres')

<style>
.genre-list {
    display: grid;
    column-gap: 3rem;
    grid-template-columns: 1fr 1fr 1fr;
}

.genre-card {
    margin: 1.5rem 0;
}

.genre-action-button {
    width: max-content;
    height: max-content;
}

@media only screen and (max-width: 900px) {
    .genre-list {
        grid-template-columns: 1fr 1fr;
    }
}
</style>

@section('content')
<div class="manage-genres-page">
    <div class="page-header">
        <h1>Genre settings</h1>
        <form action="{{route('genres.index')}}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary settings-btn large">Done</button>
        </form>
    </div>

    <div class="my-1">
        <a href="{{route('genres.create')}}">
            <button class="btn btn-primary large">Add genre</button>
        </a>
    </div>

    {{-- @component('genres.components.selector', ['genres' => $genres, 'edit' => true]) @endcomponent --}}
    <div class="genre-list">
        @foreach ($genres as $genre)
        <div class="card genre-card">
            @component('genres.components.form', array_merge(compact('genres', 'genre'), ['isEditMode' => false])) @endcomponent
            <div class="action-buttons">
                <form action="{{ route('genres.edit', $genre['id']) }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary .genre-action-button">Edit</button>
                </form>
                <form action="{{ route('genres.destroy', $genre['id']) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger .genre-action-button">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection