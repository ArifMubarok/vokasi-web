@extends('back.layouts.main')

@section('title', 'Unit Penjamin Mutu-SV')

@push('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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
                                href="{{ route('superadmin.tentangkami.unit-pendukung.UPM.index') }}">@yield('title')</a>
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
                            <h3 class="card-title">{{ Str::ucfirst('Pengenalan UPM') }}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body ">
                            <div class="row">
                                <div class="col mx-3">
                                    @if (isset($isiupm))
                                        {!! $isiupm->value !!}
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-4 justify-content-end">
                                <div class="col-1 ml-3">
                                    @if ($isiupm == null)
                                        <a href="{{ route('superadmin.tentangkami.unit-pendukung.UPM.create') }}"
                                            class="btn btn-block btn-success btn-sm">Tambah
                                        </a>
                                    @else
                                        <a href="{{ route('superadmin.tentangkami.unit-pendukung.UPM.edit') }}"
                                            class="btn btn-block btn-info btn-sm">Edit
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ Str::ucfirst('Anggota Unit Penjamin Mutu') }}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body ">
                            <div class="row mx-auto">
                                <div class="col">
                                    <table class="table table-bordered mutu-datatable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Kedudukan</th>
                                                <th>Profil</th>
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

        {{-- Datatables --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(function() {

                var table = $('.mutu-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('superadmin.tentangkami.unit-pendukung.UPM.listMutu') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'foto',
                            name: 'Foto'
                        },
                        {
                            data: 'name',
                            name: 'Nama'
                        },
                        {
                            data: 'kedudukan',
                            name: 'Posisi'
                        },
                        {
                            data: 'profil',
                            name: 'Profil'
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
                        url: "{{ route('superadmin.tentangkami.unit-pendukung.UPM.hapus') }}",
                        type: 'post',
                        data: {
                            id: id,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(params) {
                            alert(params.text)
                            $('.mutu-datatable').DataTable().ajax.reload()
                        }
                    })
                })
            });
        </script>
    @endpush
@endsection
