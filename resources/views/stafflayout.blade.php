<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Staff')</title>
        <link rel="shortcut icon" href="/images/logo.png">
        <link rel="stylesheet" href="/css/staff.css">
    </head>
    <body>
        <div class="info">{{ session('info') }}</div>

        <header>
            <div class="logo">
            <img src="/images/logo.png" class="img-responsive" alt="">
        </header>   

        <div class="nav-btn">Menu</div>
        <div class="container">

            <div class="sidebar">
                <nav>
                    <img src="/images/logo.png" class="Image2" alt="" Width="190px" Height="150px">
                    <ul>
                    <li><a href="/staff">Staff</a></li>
                    <li><a href="/reward">Reward</a></li>
                    </ul>
                </nav>
            </div>

            <div class="main-content">
            <main>
                <h1>@yield('title', 'Untitled')</h1>
                @yield('body')
            </main>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script src="/js/app.js"></script>
            @yield('foot')
    </body>
</html>