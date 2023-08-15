@extends('layouts.sidebar')

@section('content')
    <div class="container mt-5">
        <h4 class="mb-5">Edit {{$items->name}}</h4>
        <form action="{{ route('produk.update', $items->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode_product">Kode Product</label>
                <input type="text" name="kode_product" class="form-control" id="kode_product"
                    value="{{ $items->kode_product }}" required>
            </div>
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $items->name }}" id="name"
                    required>
            </div>
            <div class="mb-3">
                <label for="kategori_id">Category</label>
                <select name="kategori_id" id="kategori_id" class="form-control shadow-none" required>
                    <option value="{{$items->kategori_id}}">{{ $items->category->name }}</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="stok">Stok</label>
                <input type="number" name="stok" class="form-control" id="stok" value="{{ $items->stok }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="unit">Unit</label>
                <input type="text" name="unit" class="form-control" value="{{ $items->unit }}" id="unit"
                    required>
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" value="{{$items->price}}" id="price"
                    required>
            </div>
            <div class="mb-3">
                <label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ $items->lokasi }}" id="lokasi"
                    required>
            </div>
            <div class="mb-3">
                <label for="ket">Keterangan Product</label>
                <textarea name="ket" id="ket" cols="30" rows="5" class="form-control" required>{{ $items->ket }}</textarea>
            </div>
            <div class="mb-3">
                <label for="cover">Image</label>
                <input type="file" accept="image/*" name="cover" class="form-control" id="cover">
                <span class="text-secondary">Diisi jika ingin mengganti gambar</span>
            </div>
            <div class="d-flex align-items-center gap-3 detail">
                <button class="btn save rounded-2 p-2 px-3" type="submit">Save New Data</button>
                <a href="{{ route('produk.index') }}" class="btn back px-3">Back</a>
            </div>

        </form>

    </div>
@endsection
