@extends('layouts.main')

@section('page-title', 'Manajemen User')

@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit User</h4>
                            <form method="post" action="/dashboard/manajemen-user/{{ $user->id }}">
                            @method('put')
                            @csrf
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Nama User</label>
                                    <input class="form-control" type="text" id="name" name="name" placeholder="Masukkan nama user" value="{{ old('name', $user->name) }}" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="skpd">Instansi</label>
                                    <select class="custom-select" id="skpd" name="skpd" required>
                                        <option selected></option>
                                        @foreach ($skpd as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Masukkan kembali password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4 float-right">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
