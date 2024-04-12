@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div class="row">
                    <div class="row">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index_product') }}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('index_order') }}">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show Order</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3><strong>Detail Bayar</strong></h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">ID Order {{ $order->id }}</h5>
                        <h6 class="card-subtitle text-muted mb-2">By : {{ $order->user->name }}</h6>
                        @if ($order->is_paid == true)
                            <p class="card-text"><strong>Sudah bayar</strong></p>
                        @else
                            <p class="card-text"><strong>Belum bayar</strong></p>
                        @endif
                        <hr>
                        @foreach ($order->transactions as $item)
                            <p>{{ $item->product->name }} - {{ $item->amount }}</p>
                            @php
                                $total_price = $item->product->price * $item->amount;
                            @endphp
                        @endforeach
                        <hr>
                        @if ($order->is_paid == false && $order->payment_receipt == null)
                            <p>Total : {{ $total_price }}</p>
                            <form action="{{ route('submit_payment_receipt', $order) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <label class="form-label" for="upload_pembayaran">Upload Bukti Pembayaran</label><br>
                                <input class="form-control" type="file" name="payment_receipt"
                                    id="upload_pembayaran"><br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
