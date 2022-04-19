@extends('layout')
@section('title', 'Welcome to BRS!')

@section('content')
<style>
.alma {
    color: green;
}

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
    <h1>WELCOME!</h1>

    <pre>Book Renting Service</pre>

    <div class="alma section">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam odio fugit incidunt adipisci voluptate, nulla dolorum esse reprehenderit architecto ex nemo delectus quos quis nam optio aspernatur deleniti deserunt distinctio.</div>
    <div class="quote my-2">"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam odio fugit incidunt adipisci voluptate, nulla dolorum esse reprehenderit architecto ex nemo delectus quos quis nam optio aspernatur deleniti deserunt distinctio."</div>

    <div class="system-info my-3">
        <h2>Library info</h2>
        <div class="card system-info-card">
            <div>
                <h4>Number of users in the system</h4>
                <div>placeholder</div>
            </div>
            <div>
                <h4>Number of genres</h4>
                <div>placeholder</div>
            </div>
            <div>
                <h4>Number of books</h4>
                <div>placeholder</div>
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

    {{-- <div class="block">
        <h1>TODO ❗️</h1>
        <ul>
            <li>[x] Number of users in the system</li>
            <li>[x] Number of genres</li>
            <li>[x] Number of books</li>
            <li>[x] Number of active book rentals (in accepted status)</li>
            <li>[x] List of genres. Each list item must be a link, referring to the List by genre page.</li>
            <li>[x] Search for books. See Search.</li>
        </div>
    </div> --}}
</div>
@endsection