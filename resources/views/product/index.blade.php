@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-9">
                <div class="row">
                    @if (Auth::user()->is_admin)
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('create') }}" class="btn btn-outline-dark"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                    class="bi bi-plus-lg mb-1 " viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                </svg>Produk</a>
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3><strong>Produk</strong></h3>
                    </div>

                    <div class="card-body">
                        <div class="row row-cols-3">
                            @foreach ($products as $item)
                                <div class="col mb-3">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ url('storage/Product/' . $item->image) }}" style="height: 200px;"
                                            class="card-img-top"><br>
                                        <div class="card-body">
                                            <p class="card-text">{{ $item->name }}</p>
                                            <form action="{{ route('show', $item->id) }}" method="get">
                                                <button type="submit" class=" btn btn-primary">Show Detail</button>
                                            </form>
                                            <form action="{{ route('hapus', $item) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="mt-2 btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
