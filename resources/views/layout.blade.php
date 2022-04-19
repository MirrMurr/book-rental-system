<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400&family=Yanone+Kaffeesatz:wght@300;400;500&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{asset('/css/app.css?v=').time()}}" type="text/css"> --}}

    {{-- STYLES --}}

    <style>
    :root {
        --primary-color: rgb(44, 158, 44);
        --primary-color-dim: rgba(172, 255, 47, 0.396);
        --light-green: greenyellow;
        --dark-green: rgb(2, 77, 2);
        --color-danger: rgb(156, 63, 63);
        --color-danger-light: rgb(188, 75, 75);
        --color-danger-dark: rgb(110, 45, 45);
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    * {
        padding: 0;
        margin: 0;
    }

    body {
        display: grid;
        min-height: 100vh;
        line-height: 1.6;
        font-family: 'Yanone Kaffeesatz', 'Josefin Sans', sans-serif;
    }

    .app {
        /* background-color: #13181c; */
    }

    .layout {
        display: flex;
    }

    .nav {
        background-color: var(--primary-color);
        color: white;
        /* color: var(--dark-green); */
        height: 100vh;
        min-width: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 2rem;
        font-size: 24px;
    }

    .nav > ul {
        list-style-type: none;
        width: 70%;
    }
    .nav > ul > li {
        width: 100%;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    .nav *> li.active {
        color: var(--dark-green);
        /* color: white; */
    }

    .nav *> li:hover {
        color: var(--light-green);
        border-right: 2px solid var(--light-green);
    }
    .nav *> li:active {
        color: var(--dark-green);
    }


    .nav-footer {
        position: fixed;
        bottom: 0;
        color: var(--dark-green);
    }

    .content {
        overflow-y: scroll;
        background-color: white;
        height: 100vh;
        width: 100%;
        padding: 2rem 3rem;
        font-weight: 300;
        font-size: 24px;
    }

    .card {
        box-shadow: 0px 5px 15px #ccc;
        border-radius: 15px;
        padding: 1.5rem 2rem;
        background-color: inrehit;
    }

    .quote {
        padding: 0 1rem;
        border-left: 5px solid gray;
        border-radius: 5px;
        font-style: italic;
        color: gray;
    }

    .section {
        margin: 1rem 0;
    }

    .my-1 { margin: 1rem 0; }
    .my-2 { margin: 2rem 0; }
    .my-3 { margin: 3rem 0; }
    .my-4 { margin: 4rem 0; }
    .my-5 { margin: 5rem 0; }
    .mx-1 { margin: 0 1rem; }
    .mx-2 { margin: 0 2rem; }
    .mx-3 { margin: 0 3rem; }
    .mx-4 { margin: 0 4rem; }
    .mx-5 { margin: 0 5rem; }

    .py-1 { padding: 1rem 0; }
    .py-2 { padding: 2rem 0; }
    .py-3 { padding: 3rem 0; }
    .py-4 { padding: 4rem 0; }
    .py-5 { padding: 5rem 0; }
    .px-1 { padding: 0 1rem; }
    .px-2 { padding: 0 2rem; }
    .px-3 { padding: 0 3rem; }
    .px-4 { padding: 0 4rem; }
    .px-5 { padding: 0 5rem; }

    .content *> ul {
        padding-left: 2rem;
    }

    .hidden {
        display: none !important;
    }

    .btn {
        border: none;
        border-radius: 10px;
        padding: 7px 14px;
        cursor: pointer;
        max-width: fit-content;
        max-height: fit-content;
        font-family: 'Yanone Kaffeesatz', 'Josefin Sans', sans-serif !important;
    }

    .btn:hover {
        background-color: var(--light-green);
        outline: 2px solid var(--light-green);
    }
    .btn:active {
        background-color: var(--dark-green);
        outline: 2px solid var(--dark-green);
    }

    .btn-primary {
        outline: 2px solid var(--primary-color);
        background-color: var(--primary-color);
        color: white;
    }

    .btn-secondary {
        outline: 2px solid var(--primary-color);
        color: var(--primary-color);
        background-color: transparent;
    }
    .btn-secondary:hover {
        outline: 2px solid var(--light-green);
        color: var(--light-green);
        background-color: transparent;
    }
    .btn-secondary:active {
        outline: 2px solid var(--dark-green);
        color: var(--dark-green);
        background-color: transparent;
    }

    .small {
        font-size: 12px;
        border: 1px solid inherit;
    }
    .medium {
        font-size: 20px;
    }
    .large {
        font-size: 24px;
    }


    .form-item {
        margin-left: 1rem;
        padding: 2px 8px 2px 5px;
        border: 1px solid #ccc;
        border-radius: 8px;
        outline: none;
        min-height: 2rem;
    }
    .custom-form-item {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-width: 10rem;
        /* max-width: 50%; */
        margin-bottom: 1rem;
    }

    .custom-form-item > .form-item {
        margin-left: 0;
    }

    .input-validation-error {
        color: var(--color-danger);
    }

    .is-invalid {
        outline: 2px solid var(--color-danger);
    }

    .tags {
        display: flex;
    }

    .tag {
        border-radius: 8px;
        background-color: #eee;
        color: black;
        padding: 2px 15px;
        margin: 5px 5px;
        /* box-shadow: 0px 3px 3px #ddd; */
    }

    .tag.active {
        background-color: gray;
        color: white;
    }

    .tag:hover {
        cursor: pointer;
        background-color: #ddd;
        color: black;
    }

    .tag.primary {
        background-color: rgb(22, 114, 160);
        color: white;
    }
    .tag.primary.active {
        background-color: rgb(8, 56, 186);
        color: white;
    }
    .tag.primary:hover {
        background-color: rgb(6, 12, 96);
        color: white;
    }
    .tag.secondary {
        background-color: rgb(196, 193, 16);
        color: white;
    }
    .tag.secondary.active {
        background-color: rgb(139, 133, 11);
        color: white;
    }
    .tag.secondary:hover {
        background-color: rgb(82, 86, 4);
        color: white;
    }
    .tag.success {
        background-color: rgb(42, 167, 7);
        color: white;
    }
    .tag.success.active {
        background-color: rgb(27, 121, 5);
        color: white;
    }
    .tag.success:hover {
        background-color: rgb(8, 59, 2);
        color: white;
    }
    .tag.danger {
        background-color: rgb(170, 11, 11);
        color: white;
    }
    .tag.danger.active {
        background-color: rgb(103, 3, 3);
        color: white;
    }
    .tag.danger:hover {
        background-color: rgb(78, 1, 1);
        color: white;
    }
    .tag.warning {
        background-color: rgb(184, 135, 12);
        color: white;
    }
    .tag.warning.active {
        background-color: rgb(147, 95, 5);
        color: white;
    }
    .tag.warning:hover {
        background-color: rgb(109, 52, 3);
        color: white;
    }
    .tag.info {
        background-color: rgb(50, 160, 190);
        color: white;
    }
    .tag.info.active {
        background-color: rgb(36, 124, 139);
        color: white;
    }
    .tag.info:hover {
        background-color: rgb(30, 100, 99);
        color: white;
    }
    .tag.light {
        background-color: rgb(161, 159, 159);
        color: white;
    }
    .tag.light.active {
        background-color: rgb(125, 124, 124);
        color: white;
    }
    .tag.light:hover {
        background-color: rgb(85, 84, 84);
        color: white;
    }
    .tag.dark {
        background-color: rgb(84, 82, 82);
        color: white;
    }
    .tag.dark.active {
        background-color: rgb(62, 61, 61);
        color: white;
    }
    .tag.dark:hover {
        background-color: rgb(27, 27, 27);
        color: white;
    }

    .select-highlight {
        /* box-shadow: 0px 5px 15px var(--light-green); */
        box-shadow: 0px 5px 15px gray;
        outline: 3px solid var(--light-green);
        /* outline: 2px solid gray; */
    }

    .pending { color: blue; }
    .accepted { color: green; }
    .accepted-late { color: rgb(211, 131, 3); }
    .rejected { color: red; }
    .returned { color: gray; }

    .divider {
        height: 1px;
        width: 100%;
        margin: 1rem 0;
        background-color: var(--primary-color-dim);
    }

    .btn-danger {
        background-color: var(--color-danger);
        color: white;
    }

    .btn-danger:hover {
        background-color: var(--color-danger-light);
        color: white;
    }
    .btn-danger:active {
        background-color: var(--color-danger-dark);
        color: white;
    }

    .action-buttons {
        display: flex;
        width: max-content;
        gap: 1rem;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .row {
        display: flex;
        gap: 1.5rem;
    }

    .wrap {
        flex-wrap: wrap;
    }

    </style>
</head>
<body>
<div class="app">
    <div class="layout">
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
                    <li class="{{ (request()->is('rentals')) ? 'active' : '' }}">My rentals</li>
                </a>

                <div class="divider"></div>

                <a href="{{ route('manage-books') }}">
                    <li class="{{ (request()->is('manage-books')) ? 'active' : '' }}">Book settings</li>
                </a>
                <a href="{{ route('manage-genres') }}">
                    <li class="{{ (request()->is('manage-genres')) ? 'active' : '' }}">Genre settings</li>
                </a>

                {{-- <div class="divider"></div>

                <a href="/register">
                    <li class="{{ (request()->is('register*')) ? 'active' : '' }}">Register</li>
                </a>
                <a href="/login">
                    <li class="{{ (request()->is('login*')) ? 'active' : '' }}">Log in</li>
                </a>
                <a href="/profile">
                    <li class="{{ (request()->is('profile*')) ? 'active' : '' }}">Profile</li>
                </a> --}}

            </ul>
            <div class="nav-footer">
                BRS
            </div>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>