<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Student Roster')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-800 flex p-6 lg:p-8 min-h-screen flex-col">
    <header>
        <nav>
            <div class="w-full">
                <div>
                    <ul class="navbar-nav ms-auto flex flex-row gap-3 items-center justify-end">
                        <li class="nav-item"><span class="nav-link text-white text-md font-bold">{{ Auth::user()->name }}</span></li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link nav-link bg-white p-1 rounded hover:bg-gray-400 focus:bg-white">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <h1 class="text-white text-4xl font-bold text-center">Student Roster</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p class="text-white mt-7">&copy; {{ date('Y') }} Student Roster</p>
    </footer>
</body>
</html>
