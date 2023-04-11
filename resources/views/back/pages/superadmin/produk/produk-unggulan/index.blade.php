@extends('back.layouts.main')

@section('title', 'Produk Unggulan')

@push('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

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
                                href="{{ route('superadmin.produk.produk-unggulan.index') }}">@yield('title')</a>
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
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Deskripsi Singkat</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{-- Profil Singkat --}}
                            <div>
                                <div class="row">
                                    <div class="col mx-3">
                                        {!! $deskripsi->konten->value !!}
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-1 ml-3">
                                        <a href="{{ route('superadmin.produk.produk-unggulan.edit', $deskripsi->konten->id) }}"
                                            class="btn btn-block btn-info btn-sm">Edit</a>
                                    </div>
                                </div>
                            </div>
                            {{-- Profil Singkat End --}}

                            {{-- Profil Youtube --}}
                            <hr>
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col mx-3">
                                        <iframe width="560" height="315" src="{{ $youtube->konten->value }}"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-1 ml-3">
                                        <a href="{{ route('superadmin.produk.produk-unggulan.editYoutube', $youtube->konten->id) }}"
                                            class="btn btn-block btn-info btn-sm">Edit</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
    @endpush
@endsection
