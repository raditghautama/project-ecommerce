@extends('layouts.sidebar')

@section('content')
    <section class="py-5 mt-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="mb-0 text-dark">Product</h4>
                <a href="{{ route('produk.create') }}" class="btn btn-primary" type="button"><i class='bx bx-plus'></i>
                    Add Product
                </a>
            </div>

            <div class="table-responsive mt-5">
                <table class="table table-striped">
                    <thead>
                        <tr class="table-dark text-white">
                            <th>No</th>
                            <th>Foto</th>
                            <th>Kode Product</th>
                            <th>Name</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td><img src="{{ url('storage/' . $item->cover) }}" alt="image"
                                        style="width: 50px; height: 50px; object-fit: cover"></td>
                                <td>{{ $item->kode_product }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{ route('produk.show', $item->id) }}"
                                            class="btn btn-info rounded-2 px-2 py-1 text-decoration-none btn-sm">Detail</a>
                                        <a href="{{ route('produk.edit', $item->id) }}"
                                            class="btn btn-primary rounded-2 px-2 py-1 text-decoration-none btn-sm">Edit</a>
                                        <form action="{{ route('produk.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger rounded-2 px-1 py-1 btn-sm " type="submit"
                                                onclick="return confirm('Temenan?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
