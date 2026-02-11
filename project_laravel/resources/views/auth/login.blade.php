@extends('layouts.app')

@section('content')
<div class="container">

    {{-- ROW utama, dibuat center secara horizontal & vertical --}}
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">

        {{-- Lebar kolom login --}}
        <div class="col-md-5">
            <div class="card shadow-lg border-0">
                <div class="card-body p-4">

                    {{-- Judul halaman login --}}
                    <h4 class="text-center mb-4">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </h4>

                    {{-- Menampilkan pesan error login --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first() }}
                        </div>
                    @endif

                    {{-- Form login --}}
                    <form method="POST" action="/login">
                        @csrf {{-- Token keamanan CSRF Laravel --}}

                        {{-- INPUT EMAIL --}}
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>

                                {{-- Input email --}}
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Masukkan email"
                                    required
                                >
                            </div>
                        </div>

                        {{-- INPUT PASSWORD --}}
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">

                                {{-- Icon password --}}
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>

                                {{-- Input password --}}
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required
                                >

                                {{-- Tombol toggle show/hide password --}}
                                <div class="input-group-append">
                                    <span
                                        class="input-group-text toggle-password"
                                        data-target="password"
                                    >
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- BUTTON LOGIN --}}
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
