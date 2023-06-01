<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    <div class="row">
        <nav>
            <ul>
                <li>
                    <a href="{{route('welcome')}}">
                        welcome page
                    </a>
                </li>
                <li>
                    <a href="{{route('about')}}">
                        about page
                    </a>
                </li>
                <li>
                    <a href="{{route('contacts')}}">
                        contacts page
                    </a>
                </li>
                <li>
                    <a href="{{route('cv')}}">
                        cv page
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    @yield('content')
</div>
</body>
</html>
