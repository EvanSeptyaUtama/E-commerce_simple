@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-2 justify-content-center">
            <div class="col-lg-8">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index_product') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                        </ol>
                    </nav>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2><strong>Tambah Produk</strong></h2>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Nama Produk">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="description" id="name"
                                    placeholder="Deskripsi Produk">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <input type="number" class="form-control" name="price" id="price"
                                    placeholder="Harga Produk">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Stock</label>
                                <input type="text" class="form-control" name="stock" id="name"
                                    placeholder="Stock Produk">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Foto</label>
                                <input type="file" class="form-control" name="image" id="name">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
