@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index_product') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
                        </ol>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h2><strong>Produk Detail</strong></h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <div class="">
                                <img src="{{ url('storage/Product/' . $product->image) }}" alt="" height="300px">
                            </div>
                            <div class="">
                                <h1>{{ $product->name }}</h1>
                                <h6>{{ $product->description }}</h6>
                                <h3>Rp{{ $product->price }}</h3>
                                <hr>
                                <p>{{ $product->stock }} Stock</p>

                                @if (Auth::user()->is_admin == false)
                                    <form action="{{ route('tambah_keranjang', $product) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" aria-describedby="basic-addon2"
                                                name="amount" class="mt-2" value=1 aria-label="Recipient's username"
                                                aria-describedby="basic-addon2">
                                            <button class="btn btn-outline-secondary" type="submit" id="basic-addon2">Add
                                                Cart</button>

                                        </div>
                                    </form>
                                @endif
                                @if (Auth::user()->is_admin)
                                    <form action="{{ route('update_product', $product) }}" method="get">
                                        <button type="submit" class="mt-2 btn btn-outline-warning">Edit Product</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
