<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Untitled')</title>
    <link rel="shortcut icon" href="/images/favicon.png">
    <link rel="stylesheet" href="/css/app.css">
    @yield('head')
</head>
<body>
    <header>
        <h1>Assignment</h1>
    </header>

    <nav>
        <a href="/food">Food</a>
        <a href="/ticket">Ticket</a>
    </nav>
    
    <main>
        <a href="/frontend">Front End</a>
        <a href="/food">Back End</a>
        <h1>@yield('title', 'Untitled')</h1>
        @yield('body')
    </main>

    <footer>
        Developed by <b>BAE SUZY</b> &middot;
        Copyrighted &copy; {{ date('Y') }}
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    @yield('foot')
</body>
</html>