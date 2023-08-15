@extends('layouts.home')

@section('content')

@auth
@if (Auth::user())
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasRightLabel">YOUR <i class='bx bx-cart'></i></h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @if ($item != null)
        @foreach ($item->details as $cart)
        <div class="d-flex mb-2 ">
            <input type="hidden" id="stock{{ $cart->id }}" value="{{ $cart->product->stok }}">
                    <div class="col-md-4">
                        <img src="{{ url('storage/' . $cart->product->cover) }}"
                        alt="{{ $cart->product->name }}"
                        style="width: 60px; height: 60px; object-fit: cover" class="rounded">
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('detail', $cart->product->slug) }}"
                            class="text-dark text-decoration-none">
                            {{ str_word_count($cart->product->name) > 1 ? substr($cart->product->name, 0, 10) . '...' : $cart->product->name }}
                        </a>

                    Rp. {{ number_format($cart->price) }}

                        <form action="{{ route('cart.update', $cart->id) }}" method="post"
                            class="d-flex flex-column flex-md-row align-items-center gap-2">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" id="quantity{{ $cart->id }}"
                                class="form-control w-50" value="{{ $cart->quantity }}"
                                onchange="checkInput({{ $cart->id }})">
                            <button type="submit" class="btn btn-secondary btn-sm"
                                id="btnUpdate{{ $cart->id }}">Update</button>
                        </form>
                    </div>
                    <span class="text-danger fs-7" id="errorText{{ $cart->id }}"></span>

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
                </div>

        @endforeach

            <td colspan="4">Total
            <th class="fs-5">Rp. {{ number_format($item->total_amount) }}</th>
            &nbsp;

    @else

            <td colspan="6">
                <p class="mb-0 text-center text-danger">Belum Ada Pesanan</p>


    @endif

    @if ($item != null)
            <div class="row justify-content-end">
                <div class=" cart">
                    <a href="{{ route('checkout.index') }}" class="btn save  fw-semibold w-100">
                        Checkout Sekarang
                    </a>
                </div>
            </div>
        @endif
    </div>
  </div>
  @endif
@endauth

    <section class="slider-section d-flex">
        <div class="col-md-6 text-hero">
            <div class="text-landing">
            <span class="text-white head-font ">New Isnpiration 2023</span>
            <h1 class="text-white ">PHONE MADE FOR YOU!</h1>
            <span class="text-white head-font ">Trending from mobile and handphone style collection</span>
            <div class="button">
                <a href="#product"><button class="btn bg-kedua color-inti head-font mt-2" type="submit">VIEW PRODUCT</button></a>
            </div>
            </div>

        </div>
        <div class="col-md-6 img-hero">
            <div class="img-landing mt-5 ">
                <img src="{{ url('assets/img/landing.png')}}" style="width: 400px; height: 420px; " />
            </div>
        </div>
        <div class="sosmed gap-3 position-fixed">
            <a href="" class="logo">
                <i class='bx bxl-whatsapp '></i>
                <span class="tooltip fw-semibold">Whatsapp</span>
            </a>
            <a href="" class="logo">
                <i class='bx bxl-facebook '></i>
                <span class="tooltip fw-semibold">Facebook</span>
            </a>
            <a href="" class="logo">
                <i class='bx bxl-twitter '></i>
                <span class="tooltip fw-semibold">Twiter</span>
            </a>
            <a href="" class="logo">
                <i class='bx bxl-linkedin '></i>
                <span class="tooltip fw-semibold">Linkein</span>
            </a>
            <a href="" class="logo">
                <i class='bx bxl-instagram '></i>
                <span class="tooltip fw-semibold">Instagram</span>
            </a>
        </div>
    </section>

    {{-- PRODUCT --}}

    <div class="products" id="product">
        <h1>Products</h1>

        <div class="box">
            @foreach ($products->take(8) as $item)
            <div class="card">
                    <a href="{{ route('detail', $item->slug) }}" class="text-black" >
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                        <i class="fa-solid fa-share"></i>
                    </div>

                    <div class="image">
                        <img src="{{ url('storage/' . $item->cover) }}" style="width: 120px; height: 130px; " />
                    </div>

                    <div class="products_text">
                        <h2>{{ str_word_count($item->name) > 1 ? substr($item->name, 0, 10) . '...' : $item->name }}</h2>

                        <h3>Rp.{{ number_format($item->price) }}</h3>
                        <div class="products_star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <form action="{{ route('cart.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <input type="hidden" name="price" value="{{ $item->price }}">
                            <input type="number" name="quantity" id="quantity" class="form-control w-25 mb-2" min="1" style="display: none"
                                value="1" onchange="checkInput()" required {{ $item->stock }}>


                                    <a href="{{ route('home') }}"><button class="btn bg-inti color-kedua "
                                            type="submit">Tambah ke Keranjang</button></a>

                        </form>

                    </div>
                </a>
                </div>
            @endforeach
        </div>
    </div>
    {{-- END PRODUCT --}}
    <section class="superiority-section mt-7">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-5">
                    <div class="icon mx-auto rounded-circle  d-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px">
                        <img src="{{ url('assets/img/tag.png') }}" class="w-50" alt="">
                    </div>

                    <h4 class="text-white text-center">Harga Termurah</h4>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="icon mx-auto rounded-circle  d-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px">
                        <img src="{{ url('assets/img/stopwatch.png') }}" class="w-50" alt="">
                    </div>

                    <h4 class="text-white text-center">Pengiriman Cepat</h4>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="icon mx-auto rounded-circle  d-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px">
                        <img src="{{ url('assets/img/choice.png') }}" class="w-50" alt="">
                    </div>

                    <h4 class="text-white text-center">Banyak Pilihan</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="contact mt-5" id="contact">
        <h1>Contact</h1>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <iframe class="rounded-3 border-5" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d247.0807157056093!2d113.41328388231227!3d-7.758882638989384!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1690888005161!5m2!1sid!2sid" width="550" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-6">
                    <form action="" class="mt-3 ms-2">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Your name">
                          </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Message" rows="5"></textarea>
                          </div>
                          <div class="mb-3">
                            <div class="d-grid ">
                                <button class="btn bg-kedua  head-font fs-4 color-inti" type="button">Submit</button>
                              </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
@endsection
