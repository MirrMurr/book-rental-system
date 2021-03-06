@extends('layout')
@section('title', 'Create genre')


{{--

- *name*, text, required, at least 3, at most 255 characters
- *style*, dropdown, with values: `primary, secondary, success, danger, warning, info, light, dark`

--}}


<style>

.genre-form {
    max-width: 30%;
}
.genre-create-action-btn {
    width: max-content;
    height: max-content;
}

.action-buttons {
    margin-top: 2rem;
}
</style>

@section('content')
<div class="new-genre-page">
    <div class="page-header">
        <h1>New genre</h1>
    </div>
    <form action="{{route('genres.store')}}" method="POST">
        @csrf

        <div class="card genre-form">
            @component('genres.components.form', ['isEditMode' => true]) @endcomponent
        </div>

        <div class="row action-buttons">
            <button type="submit" class="btn btn-primary large genre-create-action-btn">Save</button>
            <a href="{{route('manage-genres')}}">
                <button type="button" class="btn btn-secondary large genre-create-action-btn">Cancel</button>
            </a>
        </div>
    </form>
</div>
@endsection