<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E commerce</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ url('assets/style/home.css') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="{{ url('assets/vendors/bootstrap.min.css') }}">
    {{-- BOXICON --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ url('assets/img/R-icon.png') }}" type="image/x-icon">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link swiperjs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- Styles -->

</head>
{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">E Commerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
            <ul class="navbar-nav me-auto  mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#product">PRODUCT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">CONTACT US</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        CATEGORY
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('home') }}" class="dropdown-item">Semua
                            Kategori</a></li>
                        @foreach ($categories as $item)
                            <li>
                                <a class="dropdown-item" href="{{ route('kategori', $item->slug) }}">{{ $item->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            @endauth
            <!-- Button trigger modal -->
            <div class="ms-auto p gap-3 d-flex fw-bold">
                <div class="dropdown">
                    <a class="text-decoration-none text-black" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class='bx bx-user'></i>
                    </a>

                    <ul class="dropdown-menu">
                        @if (Route::has('login'))
                            <div class="">

                                @auth
                                    @if (Auth::user() && Auth::user()->roles == 'admin')
                                        <a href="{{ route('dashboard') }}" class="nav-link ms-4">Dashboard</a>
                                    @endif

                                    <a class="nav-link ms-4 text-black" id="logout" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">

                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="py-0 px-0 mt-0">
                                        @csrf
                                    </form>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="nav-link ms-4">Log
                                    in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-link ms-4">Register</a>
                                @endif
                            @endauth
                </div>
                @endif
                </ul>




                  <button class="text-decoration-none text-black" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class='bx bx-cart-add ms-1' id="cart-icon"></i></button>



                <button type="button" class="ms-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class='bx bx-search'></i>
                </button>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Search</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</nav>

<div class="content">
    <!-- content -->
    @yield('content')
</div>

{{-- END NAVBAR --}}
<script src="{{ url('assets/scripts/home.js') }}"></script>
<script src="{{ url('assets/vendors/bootstrap.bundle.min.js') }}"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</body>

</html>
