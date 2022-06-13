@extends('layouts.main')

@section('css')
@endsection

@section('page-title', 'Dashboard')

@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-primary" role="alert">
                        <h4 class="alert-heading">Selamat Datang, {{ auth()->user()->name }}!</h4>
                        <p>Silakan klik menu Agenda Harian untuk melihat kalender agenda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
