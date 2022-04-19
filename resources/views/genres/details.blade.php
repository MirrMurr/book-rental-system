@extends('layout')
@section('title', 'Create genre')


{{--

- *name*, text, required, at least 3, at most 255 characters
- *style*, dropdown, with values: `primary, secondary, success, danger, warning, info, light, dark`

--}}


<style>
.genre-create-action-btn {
    width: max-content;
    height: max-content;
}

.action-buttons {
    margin-top: 2rem;
}
</style>

@section('content')
<div class="new-genre-page card">
    <div class="page-header">
        <h1>New genre</h1>
    </div>
    <form action="{{route('genres.update', $genre['id'])}}" method="POST">
        @method('PUT')
        @csrf

        @component('genres.components.form', compact('genres', 'genre', 'isEditMode')) @endcomponent

        <div class="row action-buttons">
            <button type="submit" class="btn btn-primary large genre-create-action-btn">Save</button>
            <a href="{{url()->previous()}}">
                <button type="button" class="btn btn-secondary large genre-create-action-btn">Cancel</button>
            </a>
        </div>
    </form>
</div>
@endsection