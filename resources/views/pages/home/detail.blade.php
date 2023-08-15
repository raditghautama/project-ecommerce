@extends('layouts.home')

@section('content')
    <section class="detail py-5 ms-5 px-5">
        <div class="container">
            <a class="container" href="{{ route('home') }}"><button class="btn back" type="submit">Go Back</button></a>

            <div class="d-flex  justify-content-between mb-5 mt-5">
                <div class="img-detail col-md-6">
                    <img src="{{ url('storage/' . $products->cover) }}" alt="{{ $products->name }}"
                        class="rounded-1 w-100 mb-3">

                </div>
                <div class="right ms-4 mt-5 col-md-6">

                    <h2 class="mb-2">{{ $products->name }}</h2>
                    <h5 class="text-dark fw-semibold mb-2">Rp. {{ number_format($products->price) }}</h5>
                    <h4 class="text-dark mb-2">From {{ $products->category->name }}</h4>

                    <p class="text-secondary mb-5">{!! $products->ket !!}</p>
                    <p class="text-secondary mb-4">Stok: {{ $products->stok }}</p>

                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                        <input type="hidden" name="price" value="{{ $products->price }}">
                        <input type="number" name="quantity" id="quantity" class="form-control w-25 mb-2" min="1"
                            value="1" onchange="checkInput()" required {{ $products->stok }}>

                        <div class="d-flex align-items-center gap-2 flex-column flex-md-row">
                            @auth
                                <a href="{{ route('cart.index') }}"><button class="btn bg-inti color-kedua py-3 px-5"
                                        type="submit">Tambah ke Keranjang</button></a>
                            @else
                                <a class="btn btn-outline-dark py-3 px-5" href="{{ route('register') }}">
                                    Daftar untuk Order
                                </a>
                            @endauth
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
    @endsection
