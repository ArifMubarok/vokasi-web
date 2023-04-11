@extends('back.layouts.main')

@section('title', 'Profil Lulusan')

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
                                href="{{ route('admin.pages.profil-lulusan.index') }}">@yield('title')</a></li>
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
                    @if (isset($data))
                        <div class="row justify-content-end mb-3">
                            <div class="col-1">
                                <a href="{{ route('admin.pages.profil-lulusan.edit', $data->id) }}"
                                    class="btn btn-block btn-info btn-sm">Edit</a>
                            </div>
                            <div class="col-1">
                                <form action="{{ route('admin.pages.profil-lulusan.destroy', $data->id) }}" method="post"
                                    onsubmit="return confirm('Anda yakin ingin menghapus data?');">
                                    @csrf
                                    <button type="submit"
                                        href="{{ route('admin.pages.profil-lulusan.destroy', $data->id) }}"
                                        class="btn btn-block btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>

                        {{-- Gambaran Umum --}}
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-body">
                                <div class="mx-auto mt-3">
                                    <p class="mt-4">{!! $data->value !!}</p>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    @else
                        <div class="card">
                            <div class="card-body">
                                <div class="row mx-auto">
                                    <div class="my-3">
                                        <a href="{{ route('admin.pages.profil-lulusan.create') }}"
                                            class="btn btn-block btn-primary btn-sm">Tambah</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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

            @if (Session::has('delete'))
                Toast.fire({
                    icon: 'success',
                    title: 'Success delete data!'
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
