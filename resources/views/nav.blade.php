<div class="nav">
    <ul>
        <a href="{{route('home')}}">
            <li class="{{ (request()->is('home')) ? 'active' : '' }}">Home</li>
        </a>
        <a href="{{route('books.index')}}">
            <li class="{{ (request()->is('books') || request()->is('search-books')) ? 'active' : '' }}">Books</li>
        </a>
        <a href="{{route('genres.index')}}">
            <li class="{{ (request()->is('genres')) ? 'active' : '' }}">Genres</li>
        </a>

        <a href="{{route('rentals.index')}}">
            <li class="{{ (request()->is('rentals')) ? 'active' : '' }}">Rentals</li>
        </a>

        <div class="divider"></div>

        <a href="{{ route('books.create') }}">
            <li class="{{ (request()->is('books/create')) ? 'active' : '' }}">Add book</li>
        </a>
        <a href="{{ route('manage-genres') }}">
            <li class="{{ (request()->is('manage-genres')) ? 'active' : '' }}">Manage genres</li>
        </a>

        <div class="divider"></div>

        <a href="/profile">
            <li class="{{ (request()->is('profile*')) ? 'active' : '' }}">Profile</li>
        </a>

        <div class="divider"></div>

        <a href="/login">
            <li class="{{ (request()->is('login*')) ? 'active' : '' }}">Log in</li>
        </a>
    </ul>

    <div class="nav-footer">
        BRS
    </div>
</div>