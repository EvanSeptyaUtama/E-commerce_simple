@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2><strong>Edit Profile</strong></h2>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('edit_profile') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ $user->email }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Role</label>
                                <input type="text" class="form-control" name="is_admin" id="email"
                                    value="{{ $user->is_admin ? 'Admin' : 'Member' }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirmation Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
