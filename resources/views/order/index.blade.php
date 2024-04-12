@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-8 sm:col-3">
                <div class="card">
                    <div class="card-header">

                        <h3 class="mb-3"><strong>Orderan</strong></h3>
                    </div>

                    <div class="card-body m-3">
                        <div class="row row-cols-3 sm:row-cols-1">
                            @foreach ($orders as $order)
                                <div class="col">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <a href="{{ route('show_order', $order) }}">
                                                <h5 class="card-title">ORDER ID {{ $order->id }}</h5>
                                            </a>
                                            <p class="card-text">Nama : {{ $order->user->name }}</p>
                                            <p class="card-text">Waktu Order : {{ $order->created_at }}</p>
                                            <p class="card-text">
                                                @if ($order->is_paid == true)
                                                    <strong>Berhasil bayar</strong>
                                                @else
                                                    Belum bayar
                                                    @if ($order->payment_receipt)
                                                        <a
                                                            href="{{ url('storage/Pembayaran/' . $order->payment_receipt) }}">Bukti</a>
                                                    @endif

                                                    @if (Auth::user()->is_admin)
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <form action="{{ route('confirm_payment', $order) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-outline-secondary">Konfirmasi</button>
                                                                </form>
                                                            </div>
                                                        @else
                                                            <div class="col-md-6">
                                                                <form action="{{ route('show_order', $order) }}"
                                                                    method="get">
                                                                    <button type="submit" class="btn btn-dark">Detail
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif
                                        </div>
                            @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
            <div class="col-lg-3">
                <a href="{{ route('index_product') }}" type="submit" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
    </div>
    </div>
@endsection
