<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ Vite::asset('resources/scss/app.scss') }}" />
    <script defer src="{{ Vite::asset('resources/js/app.js') }}"></script>
    <title> @yield('title')</title>
</head>

<body>
    <nav class="navbar bg-dark navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link{{ Route::currentRouteName() == "post.index" ? " active" : "" }}" aria-current="page" href="{{ route("post.index") }}">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ Route::currentRouteName() == "post.trash" ? " active" : "" }}" href="{{ route('post.trash') }}">Trash</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ Route::currentRouteName() == "post.create" ? " active" : "" }}" href="{{ route("post.create") }}">Create post</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>

</html>
