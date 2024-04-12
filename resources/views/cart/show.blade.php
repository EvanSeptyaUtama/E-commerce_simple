@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-9">
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
                        <h3><strong>Edit Keranjang</strong></h3>
                    </div>
                    @php
                        $total_price = 0;
                    @endphp
                    <div class="card-body">
                        <div class="row row-cols-3">
                            @foreach ($cart as $item)
                                <div class="col mb-3">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ url('/storage/Product/' . $item->product->image) }}"
                                            style="height: 200px;" class="card-img-top">
                                        <div class="card-body">
                                            <h3 class="card-text"><strong>{{ $item->product->name }}</strong></h3>
                                            <form action="{{ route('update_process', $item) }}" method="post">
                                                @csrf
                                                @method('patch')
                                                <div class="">
                                                    <p>{{ $item->product->stock }} Stock</p>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="amount"
                                                            value="{{ $item->amount }}" aria-describedby="basic-addon2"
                                                            aria-describedby="basic-addon2">
                                                        <button class="btn btn-outline-secondary" type="submit"
                                                            id="basic-addon2">Ubah</button>
                                                    </div>
                                                </div>

                                            </form>
                                            <form action="{{ route('delete_cart', $item) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger mt-2">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $total_price += $item->product->price * $item->amount;
                                @endphp
                            @endforeach
                        </div>
                        <div class="row g-2">
                            <div class="col-auto">
                                <p>Total : {{ $total_price }}</p>
                                <form action="{{ route('checkout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary mb-2">Checkout</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
