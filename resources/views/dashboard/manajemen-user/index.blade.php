@extends('layouts.main')

@section('page-title', 'Manajemen User')

@section('css')
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection

@section('content')
<div class="main-content-inner">
    <div class="row">
        <!-- Dark table start -->
        <div class="col-12 mt-5">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times"></span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title d-inline">Daftar User</h4>
                    <a href="/dashboard/manajemen-user/create" class="btn btn-success float-right d-inline mb-3"><i class="ti-plus"></i> Tambah User</a>
                    <div class="data-tables datatable-dark">
                        <table id="dataTable3" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->is_admin }}</td>
                                    <td>
                                        {{-- <a href="/dashboard/manajemen-user/{{ $user->id }}" class="btn btn-primary"><i class="ti-search"></i></a> --}}
                                        <a href="/dashboard/manajemen-user/{{ $user->id }}/edit" class="btn btn-warning"><i class="ti-pencil-alt"></i></a>
                                        <form action="/dashboard/manajemen-user/{{ $user->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus user ini?')"><i class="ti-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dark table end -->
    </div>
</div>
@endsection

@section('js')
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
    $('#dataTable3').DataTable();
} );
</script>
@endsection
