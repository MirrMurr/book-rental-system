<div class="nav">
    <ul>
        @auth
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

        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            <li>{{ __('Log out') }}</li>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        @else

        <a href="/register">
            <li class="{{ (request()->is('register*')) ? 'active' : '' }}">Register</li>
        </a>

        <a href="/login">
            <li class="{{ (request()->is('login*')) ? 'active' : '' }}">Log in</li>
        </a>
        @endauth
    </ul>

    <div class="nav-footer">
        BRS
    </div>
</div>