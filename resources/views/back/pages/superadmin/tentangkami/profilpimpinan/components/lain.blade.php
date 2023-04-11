@extends('back.layouts.main')

@section('title', 'List Unsur Lain')

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
            <div class="row">
                <div class="col-2 my-3">
                    <a href="{{ route('superadmin.tentangkami.profil-pimpinan.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Unsur Lain</h3>

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
                                    <table class="table table-bordered lain-datatable">
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
    @push('js')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(function() {

                var table = $('.lain-datatable').DataTable({
                    paging: false,
                    searching: false,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('superadmin.tentangkami.profil-pimpinan.lain.listLain') }}",
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
                    ],
                    columnDefs: [{
                            className: 'text-center',
                            width: '15%',
                            targets: [1]
                        },
                        {
                            className: 'text-center',
                            width: '15%',
                            targets: [2]
                        },
                    ]
                });



                $(document).on('click', '.hapus', function() {
                    let id = $(this).attr('id')
                    $.ajax({
                        url: "{{ route('superadmin.tentangkami.profil-pimpinan.hapus') }}",
                        type: 'post',
                        data: {
                            id: id,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(params) {
                            alert(params.text)
                            $('.lain-datatable').DataTable().ajax.reload()
                        }
                    })
                })
            });
        </script>
    @endpush
@endsection
