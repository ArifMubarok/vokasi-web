@extends('back.layouts.main')

@section('title', 'Kerjasama')

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
                                href="{{ route('superadmin.tentangkami.kerjasama.index') }}">@yield('title')</a>
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
                    <a href="{{ route('superadmin.tentangkami.kerjasama.create') }}"
                        class="btn btn-block btn-primary btn-sm">Tambah</a>
                </div>
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Daftar @yield('title')</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{-- {{ $dataTable->table() }} --}}
                            <div class="row mx-auto">
                                <div class="col">
                                    <table class="table table-bordered kerjasama-datatable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Logo Mitra</th>
                                                <th>Instansi</th>
                                                <th>Link</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
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
                                <a href="{{ route('superadmin.tentangkami.kerjasama.editDeskripsi', $deskripsi->konten->id) }}"
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
                                <p><a href="{{ $link->konten->value }}" target="_blank" rel="noopener noreferrer">{{ $link->konten->value }}</a></p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-1 ml-3">
                                <a href="{{ route('superadmin.tentangkami.kerjasama.editLink', $link->konten->id) }}"
                                    class="btn btn-block btn-info btn-sm">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <div class="col mx-3">
                                <p><img src="{{ asset('storage/images/kerjasama/' . $gambar->konten->value) }}"
                                        alt="picture" style="max-width: 250px ;"></p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-1 ml-3">
                                <a href="{{ route('superadmin.tentangkami.kerjasama.editGambar', $gambar->konten->id) }}"
                                    class="btn btn-block btn-info btn-sm">Edit</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
        <script type="text/javascript">
            $(function() {

                var table = $('.kerjasama-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('superadmin.tentangkami.kerjasama.list') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'logo',
                            name: 'Logo Mitra'
                        },
                        {
                            data: 'instansi',
                            name: 'Instansi'
                        },
                        {
                            data: 'link',
                            name: 'Link'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });

                $(document).on('click', '.hapus', function() {
                    let id = $(this).attr('id')
                    $.ajax({
                        url: "{{ route('superadmin.tentangkami.kerjasama.hapus') }}",
                        type: 'post',
                        data: {
                            id: id,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(params) {
                            alert(params.text)
                            $('.kerjasama-datatable').DataTable().ajax.reload()
                        }
                    })
                })
            });
        </script>
    @endpush
@endsection
