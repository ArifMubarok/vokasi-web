@extends('back.layouts.main')

@section('title', 'Pengabdian Masyarakat')

@push('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('dataTables/css/jquery.dataTables.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    {{-- <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
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
                        {{-- <li class="breadcrumb-item"><a href="#">Settings</a></li> --}}
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.pengabdian-masyarakat.index') }}">@yield('title')</a></li>
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
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar @yield('title')</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mx-auto">
                                <div class="col-3 my-3">
                                    <a href="{{ route('admin.pengabdian-masyarakat.create') }}"
                                        class="btn btn-block btn-primary btn-sm">Tambah</a>
                                </div>
                            </div>
                            {{-- {{ $dataTable->table() }} --}}
                            <div class="row mx-auto">
                                <div class="col">
                                    <table class="table table-bordered berita-datatable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Foto</th>
                                                <th>Judul</th>
                                                <th>Konten</th>
                                                <th>Kategori</th>
                                                <th>Validasi</th>
                                                <th>Status</th>
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

                var table = $('.berita-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.pengabdian-masyarakat.list') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'foto_header',
                            name: 'Foto'
                        },
                        {
                            data: 'judul',
                            name: 'judul'
                        },
                        {
                            data: 'konten',
                            name: 'konten'
                        },
                        {
                            data: 'kategori',
                            name: 'kategori'
                        },
                        {
                            data: 'isValidate',
                            name: 'Validasi'
                        },
                        {
                            data: 'status',
                            name: 'status'
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
                            width: '3%',
                            targets: [0]
                        },
                        {
                            className: 'text-center',
                            targets: [1]
                        },
                        {
                            className: 'text-center',
                            width: '13%',
                            targets: [6]
                        },
                    ]
                });

                $(document).on('click', '.hapus', function() {
                    let id = $(this).attr('id')
                    $.ajax({
                        url: "{{ route('admin.pengabdian-masyarakat.hapus') }}",
                        type: 'post',
                        data: {
                            id: id,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(params) {
                            alert(params.text)
                            $('.berita-datatable').DataTable().ajax.reload()
                        }
                    })
                })
            });
        </script>
    @endpush




@endsection
