@extends('back.layouts.main')

@section('title', 'Profil Pimpinan')

@push('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@yield('title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('superadmin.tentangkami.profil-pimpinan.index') }}">@yield('title')</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="col-2 my-3">
                    <a href="{{ route('superadmin.tentangkami.profil-pimpinan.create') }}"
                        class="btn btn-block btn-primary btn-sm">Tambah</a>
                </div>
                <div class="col-12">

                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Profil Pimpinan</h3>
                    
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mx-auto">
                                <div class="col">
                                    <a href="{{ route('superadmin.tentangkami.profil-pimpinan.dekan.index') }}" class="btn btn-success">List Dekan</a>
                                </div>
                                <div class="col">
                                    <a href="{{ route('superadmin.tentangkami.profil-pimpinan.senat.index') }}" class="btn btn-success">List Senat</a>
                                </div>
                                <div class="col">
                                    <a href="{{ route('superadmin.tentangkami.profil-pimpinan.koordinator.index') }}" class="btn btn-success">List Koordinator</a>
                                </div>
                                <div class="col">
                                    <a href="{{ route('superadmin.tentangkami.profil-pimpinan.mutu.index') }}" class="btn btn-success">List Penjamin Mutu</a>
                                </div>
                            </div>
                            <div class="row mx-auto mt-4">
                                <div class="col">
                                    <a href="{{ route('superadmin.tentangkami.profil-pimpinan.lain.index') }}" class="btn btn-success">List Unsur Lain</a>
                                </div>
                                <div class="col">
                                    <a href="{{ route('superadmin.tentangkami.profil-pimpinan.prodi.index') }}" class="btn btn-success">List Kepala Program Prodi</a>
                                </div>
                                <div class="col">
                                    <a href="{{ route('superadmin.tentangkami.profil-pimpinan.laboratorium.index') }}" class="btn btn-success">List Kepala Laboratorium</a>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    {{-- @include('back.pages.superadmin.tentangkami.profilpimpinan.components.dekan')
                    @include('back.pages.superadmin.tentangkami.profilpimpinan.components.senat')
                    @include('back.pages.superadmin.tentangkami.profilpimpinan.components.koordinator')
                    @include('back.pages.superadmin.tentangkami.profilpimpinan.components.mutu')
                    @include('back.pages.superadmin.tentangkami.profilpimpinan.components.lain')
                    @include('back.pages.superadmin.tentangkami.profilpimpinan.components.laboratorium') --}}
                </div>
            </div>
    </section>
    <!-- /.content -->

    @push('js')
        <!-- SweetAlert2 -->
        <script src="{{ asset('assets/adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            @if (Session::has('success'))
                Toast.fire({
                    icon: 'success',
                    title: 'Success saving data!'
                })
            @endif
            @if (Session::has('error'))
                Toast.fire({
                    icon: 'error',
                    title: 'Error when submit to system!'
                })
            @endif
        </script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    @endpush
@endsection
