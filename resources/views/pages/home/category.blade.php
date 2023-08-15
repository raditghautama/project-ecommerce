@extends('layouts.home')

@section('content')


    {{-- PRODUCT --}}

    <div class="products" id="product">
        <h1>Products {{$category->name}}</h1>

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
                        <a href="#" class="btn">Add To Cart</a>
                    </div>
                </a>
                </div>
            @endforeach
        </div>
    </div>
    @include('components.footer')
@endsection
