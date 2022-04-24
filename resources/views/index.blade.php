@extends('layout')
@section('title', 'Welcome to BRS!')

@section('content')
<style>
.system-info-card {
    display: grid;
    column-gap: 3rem;
    grid-template-columns: 1fr 1fr 1fr 1fr;
}

.system-info-card > * {
    margin-bottom: 1rem;
}

.col--1 { grid-template-columns: 1fr; }
.col--2 { grid-template-columns: 1fr 1fr; }
.col--3 { grid-template-columns: 1fr 1fr 1fr; }
.col--4 { grid-template-columns: 1fr 1fr 1fr 1fr; }

@media only screen and (max-width: 1400px) {
    .system-info-card {
        grid-template-columns: 1fr 1fr 1fr;
    }
}
@media only screen and (max-width: 1150px) {
    .system-info-card {
        grid-template-columns: 1fr 1fr;
    }
}
@media only screen and (max-width: 850px) {
    .system-info-card {
        grid-template-columns: 1fr;
    }
}

</style>
<div>
    @auth
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    @endauth

    @guest
    <h1>Welcome!</h1>
    @endguest

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <pre>Book Renting Service</pre>

    <div class="quote my-2">“A reader lives a thousand lives before he dies . . . The man who never reads lives only one.”</div>

    <div class="system-info my-3">
        <h2>Library info</h2>
        <div class="card system-info-card">
            <div>
                <h4>Number of users in the system</h4>
                <div>{{ count($users) }}</div>
            </div>
            <div>
                <h4>Number of genres</h4>
                <div>{{ count($genres) }}</div>
            </div>
            <div>
                <h4>Number of books</h4>
                <div>{{ count($books) }}</div>
            </div>
            <div>
                <h4>Number of active book rentals</h4>
                <div>placeholder</div>
            </div>
        </div>
    </div>

    <div class="genres my-3">
        <h2>Genres</h2>
        @component('genres.components.selector', compact('genres')) @endcomponent
    </div>

    <div class="book-search my-3">
        <h2>Search books</h2>
        @component('books.components.search') @endcomponent
    </div>

</div>
@endsection