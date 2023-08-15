<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ url('assets/style/style.css') }}">
    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="{{ url('assets/vendors/bootstrap.min.css') }}">
    {{-- BOXICON --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ url('assets/img/R-icon.png') }}" type="image/x-icon">

    <!-- CHART -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <!-- sidebar -->
    <div class="sidebar">
        <div class="logo-content">
            <div class="logo">
                <div class="logo-name">E Commerce
                </div>
            </div>
            <i class="bx bx-menu" id="toggleMenu"></i>
        </div>
        <ul class="nav-list mt-5">
            <li class="nav-item">
                <i class="bx bx-search"></i>
                <input type="text" placeholder="Search . . ." class="sidebar-search" />
                <span class="tooltip">Search</span>
            </li>
            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="nav-name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bx bx-data"></i>
                    <span class="nav-name">Product</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li>
                        <a href="{{route('produk.index')}}" class="nav-link dropdown-item">
                            <i class="bx bx-data"></i> <span class="nav-name">Product</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{route('kategori.index')}}" class="nav-link dropdown-item">
                            <i class='bx bx-category'></i> <span class="nav-name">Category</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.transaksi')}}" class="nav-link">
                    <i class="bx bx-table"></i>
                    <span class="nav-name">Transaction</span>
                </a>
                <span class="tooltip">Transaction</span>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.report')}}" class="nav-link">
                    <i class="bx bx-cart"></i> <span class="nav-name">Laporan Penjualan</span>
                </a>
                <span class="tooltip">Laporan Penjualan</span>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class='bx bx-user'></i> <span class="nav-name">Admin</span>
                </a>
                <span class="tooltip">Admin</span>
            </li>
            <li class="nav-item">
                <a href="{{route('bank.index')}}" class="nav-link">
                    <i class='bx bxs-bank' ></i><span class="nav-name">Bank</span>
                </a>
                <span class="tooltip">Bank</span>
            </li>
            <li class="nav-item">
                <a href="{{route('home')}}" class="nav-link">
                    <i class='bx bx-home'></i></i><span class="nav-name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>

        </ul>


        {{-- Authentication Links --}}
        <ul class="nav-list">
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link text-white">
                        <i class='bx bx-log-in me-2'></i> <span class="nav-name">Login</span>
                    </a>
                    <span class="tooltip">Login</span>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">

                    <a href="{{ route('register') }}" class="nav-link text-white">
                        <i class='bx bx-registered me-2'></i> <span class="nav-name">Register</span>
                    </a>
                    <span class="tooltip">Register</span>
                </li>
            @endif
        </ul>
        @else
            <div class="profile-content">
                <div class="profile">
                    <div class="profile-details mt-1">
                        <i class='bx bx-user me-2'></i>
                        <div class="name-job">
                            <div class="name ">

                                {{ Auth::user()->name }}
                            </div>
                        </div>
                    </div>

                    <div class="logout">
                        <a class="text-decoration-none text-white" id="logout" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">

                            <i class='bx bx-log-out'></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="py-0 px-0 mt-0">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        @endguest
    </div>

    <div class="content-wrapper">
        <!-- content -->
        @yield('content')
    </div>
    <script src="{{ url('assets/scripts/script.js') }}"></script>
    <script src="{{ url('assets/vendors/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
