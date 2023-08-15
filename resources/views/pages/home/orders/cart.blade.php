@extends('layouts.home')

@section('content')
<section class="collection-section" id="collection">
    <div class="container">
        <div class="d-flex justify-content-between cart">
            <h1 class="title "><i class='bx bx-cart'></i> {{ Auth::user()->name }}</h1>
        <div class="text mt-5">
            <a href="{{ route('home') }}" class="btn back ">Lanjutkan Berbelanja</a>
        </div>
        </div>

        <div class="table-responsive mb-5">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-uppercase fs-7">cover</th>
                        <th class="text-uppercase fs-7">product name</th>
                        <th class="text-uppercase fs-7">price</th>
                        <th class="text-uppercase fs-7">quantity</th>
                        <th class="text-uppercase fs-7">sub-total</th>
                        <th class="text-uppercase fs-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($item != null)
                        @foreach ($item->details as $cart)
                            <input type="hidden" id="stock{{ $cart->id }}" value="{{ $cart->product->stok }}">
                            <tr style="vertical-align: middle">
                                <td>
                                    <img src="{{ url('storage/' . $cart->product->cover) }}"
                                        alt="{{ $cart->product->name }}"
                                        style="width: 40px; height: 30px; object-fit: cover" class="rounded">
                                </td>
                                <td>
                                    <a href="{{ route('detail', $cart->product->slug) }}"
                                        class="text-dark text-decoration-none">
                                        {{ $cart->product->name }}
                                    </a>
                                </td>
                                <td>Rp. {{ number_format($cart->price) }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $cart->id) }}" method="post"
                                        class="d-flex flex-column flex-md-row align-items-center gap-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="quantity" id="quantity{{ $cart->id }}"
                                            class="form-control w-25" value="{{ $cart->quantity }}"
                                            onchange="checkInput({{ $cart->id }})">
                                        <button type="submit" class="btn btn-secondary btn-sm"
                                            id="btnUpdate{{ $cart->id }}">Update</button>
                                    </form>
                                    <span class="text-danger fs-7" id="errorText{{ $cart->id }}"></span>
                                </td>
                                <td>Rp. {{ number_format($cart->price * $cart->quantity) }}</td>
                                <td>
                                    <form action="{{ route('cart.destroy', $cart->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm d-flex align-items-center justify-content-center gap-2"
                                            onclick="return confirm('Are you sure to deleted this?')">
                                            <i class="bx bx-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">Total</td>
                            <th class="fs-5">Rp. {{ number_format($item->total_amount) }}</th>
                            <td>&nbsp;</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="6">
                                <p class="mb-0 text-center text-danger">Belum Ada Pesanan</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        @if ($item != null)
            <div class="row justify-content-end">
                <div class="col-md-3 cart">
                    <a href="{{ route('checkout.index') }}" class="btn save py-3 px-5 fw-semibold w-100">
                        Checkout Sekarang
                    </a>
                </div>
            </div>
        @endif

    </div>
</section>


@include('components.footer')
@endsection
