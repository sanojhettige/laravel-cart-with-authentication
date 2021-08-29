<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Auth App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="antialiased">

    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #EF3B2E;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="/">Auth App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFF;" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFF;" href="{{ route('signup') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFF;" href="{{ route('products') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFF;" href="{{ route('orders') }}">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFF;" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFF;" href="{{ route('cart') }}">Cart ({{ count($cart ?? []) ?? '0' }})</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-11">
            @yield('content')
        </div>
    </div>
    

</body>

</html>