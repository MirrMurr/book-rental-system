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
        background-color: rgb(44, 158, 44);
        color: white;
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

    .nav *> a {
        text-decoration: none;
        color: inherit;
    }

    .nav *> li.active {
        color: rgb(2, 77, 2);
    }

    .nav *> li:hover {
        color: greenyellow;
        border-right: 2px solid greenyellow;
    }
    .nav *> li:active {
        color: rgb(2, 77, 2);
    }


    .nav-footer {
        position: fixed;
        bottom: 0;
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
        width: 100%;
        height: 100%;
        box-shadow: 0px 5px 15px #bbb;
        border-radius: 15px;
        padding: 1.5rem 2rem;
        background-color: inrehit;
    }

    </style>
</head>
<body>



{{-- HTML --}}

<div class="app">
    <div class="layout">
        <div class="nav">
            <ul>
                <a href="/books">
                    <li class="{{ (request()->is('books*')) ? 'active' : '' }}">Books</li>
                </a>
                <a href="/read">
                    <li class="{{ (request()->is('read*')) ? 'active' : '' }}">Read</li>
                </a>
                <a href="/rent">
                    <li class="{{ (request()->is('rent*')) ? 'active' : '' }}">Rent</li>
                </a>
                <a href="/login">
                    <li class="{{ (request()->is('login*')) ? 'active' : '' }}">Log in</li>
                </a>
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