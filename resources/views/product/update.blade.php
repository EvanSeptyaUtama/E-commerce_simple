@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-2 justify-content-center">
            <div class="col-md-8">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index_product') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">
                        <h2><strong>Edit Produk</strong></h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('update_produk', $product) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $product->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Description</label>
                                <input type="text" class="form-control" id="deskripsi" name="description"
                                    value="{{ $product->description }}">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Price</label>
                                <input type="text" class="form-control" id="deskripsi" name="price"
                                    value="{{ $product->price }}">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Stock</label>
                                <input type="text" class="form-control" id="deskripsi" name="stock"
                                    value="{{ $product->stock }}">
                            </div>
                            <div class="mb-3">
                                <input type="file" name="image" alt="">
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
