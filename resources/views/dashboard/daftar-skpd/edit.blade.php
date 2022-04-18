@extends('layouts.main')

@section('page-title', 'Daftar SKPD')

@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit SKPD</h4>
                            <form method="post" action="/dashboard/daftar-skpd/{{ $skpd->id }}">
                            @method('put')
                            @csrf
                                <div class="form-group">
                                    <label for="nama" class="col-form-label">Nama SKPD</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text" id="nama" name="nama" placeholder="Masukkan nama SKPD" value="{{ old('nama', $skpd->nama) }}" required autofocus>
                                </div>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group">
                                    <label for="alias" class="col-form-label">Alias</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text" id="alias" name="alias" placeholder="Masukkan alias" value="{{ old('alias', $skpd->alias) }}" required>
                                </div>
                                @error('alias')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
