@extends('back.layouts.main')

@section('title', 'Program Studi')

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
                    <h1>Program Studi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">Settings</a></li> --}}
                        <li class="breadcrumb-item"><a href="{{ route('superadmin.settings.prodi.index') }}">Program
                                Studi</a></li>
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
                            <h3 class="card-title">Daftar Program Studi</h3>

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
                                    <a href="{{ route('superadmin.settings.prodi.create') }}"
                                        class="btn btn-block btn-primary btn-sm">Tambah</a>
                                </div>
                            </div>
                            {{-- {{ $dataTable->table() }} --}}
                            <div class="row mx-auto">
                                <div class="col">
                                    <table class="table table-bordered prodi-datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Logo</th>
                                                <th>Nama</th>
                                                <th>Tingkat</th>
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


        {{-- <link rel="stylesheet" href="{{ asset('dataTables/js/jquery.dataTables.min.js') }}"> --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
        {{-- {{$dataTable->scripts()}} --}}
        {{-- $(document).ready( function () {
        $('#myTable').DataTable();
    } ); --}}

        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        {{-- <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> --}}
        <script type="text/javascript">
            $(function() {

                var table = $('.prodi-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    buttons: [
                        'copy', 'excel', 'pdf'
                    ],
                    ajax: "{{ route('superadmin.settings.prodi.list') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'logo',
                            name: 'Logo'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'tingkat',
                            name: 'tingkat'
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
                    if (window.confirm('Are you sure?')) {
                        let id = $(this).attr('id')
                        $.ajax({
                            url: "{{ route('superadmin.settings.prodi.hapus') }}",
                            type: 'post',
                            data: {
                                id: id,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(params) {
                                alert(params.text)
                                $('.prodi-datatable').DataTable().ajax.reload()
                            }
                        })
                    }
                })
            });
        </script>
    @endpush




@endsection
