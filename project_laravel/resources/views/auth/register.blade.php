@extends('layouts.app')

@section('content')
<div class="container">

    {{-- ROW utama, dibuat center secara horizontal & vertical --}}
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">

        {{-- Kolom card register --}}
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-body p-4">

                    {{-- Judul halaman register --}}
                    <h4 class="text-center mb-4">
                        <i class="fas fa-user-plus mr-2"></i>Register
                    </h4>

                    {{-- Menampilkan pesan error validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first() }}
                        </div>
                    @endif

                    {{-- Form register --}}
                    <form method="POST" action="/register">
                        @csrf {{-- Token keamanan CSRF Laravel --}}

                        {{-- INPUT NAMA --}}
                        <div class="form-group">
                            <label>Nama</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>

                                {{-- Input nama user --}}
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Masukkan nama"
                                    required
                                >
                            </div>
                        </div>

                        {{-- INPUT EMAIL --}}
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>

                                {{-- Input email user --}}
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

                        {{-- INPUT KONFIRMASI PASSWORD --}}
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>

                                {{-- Input konfirmasi password --}}
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="form-control"
                                    placeholder="Ulangi password"
                                    required
                                >

                                {{-- Tombol toggle show/hide konfirmasi password --}}
                                <div class="input-group-append">
                                    <span
                                        class="input-group-text toggle-password"
                                        data-target="password_confirmation"
                                    >
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- BUTTON REGISTER --}}
                        <button type="submit" class="btn btn-success btn-block">
                            <i class="fas fa-user-plus"></i> Register
                        </button>
                    </form>

                    <hr>

                    {{-- Link menuju halaman login --}}
                    <p class="text-center mb-0">
                        Sudah punya akun?
                        <a href="/login">Login di sini</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
