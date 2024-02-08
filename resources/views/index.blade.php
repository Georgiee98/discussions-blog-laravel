<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite(['resources/css/index/nav-bar.css'])

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <nav>


        <div class="nav-logo">
            <button class="nav-img">LOGO</button>
            <!-- <p class="p1">NAME</p> -->
            <form action="{{ route('submitContactForm') }}" method="POST">
                @csrf
                <div>
                    <h2>Contact Us</h2>
                    <input type="email" name="email" required>
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="nav-links p-1">
            <p class="nav-links-p p-1">Links (Dropdown)</p>
            <div class="nav-links-dropdown">
                <p class="nav-links-p p-1">Link A</p>
                <p class="nav-links-p p-1">Link B</p>
                <p class="nav-links-p p-1">Link C</p>
                <p class="nav-links-p p-1">Link X</p>
                <p class="nav-links-p p-1">Link Y</p>
            </div>


        </div>
        <p class="nav-links-p p-1">Resume</p>
        <p class="nav-links-p p-1">Brainstern</p>
        <div>
            @if (Auth::check())
            <!-- User is authenticated -->
            <p>Welcome, {{ Auth::user()->name }}</p>
            <a href="{{ route('logout') }}">Logout</a>
            @else
            <!-- User is not authenticated -->
            <a href="/login">LOGIN</a>
            @endif
        </div>
        <!-- <form action="POST" class="smpt-email">
            <input type="text" name="smpt_email_text" id="">
            <input type="submit" value="submit">
        </form> -->
    </nav>
    <!-- Navbar -->
    @yield('content')





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
</body>

</html>