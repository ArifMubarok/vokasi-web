@extends('back.layouts.main')

@section('title', 'Senat')

@push('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

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
                        {{-- <li class="breadcrumb-item"><a href="#">Settings</a></li> --}}
                        <li class="breadcrumb-item"><a
                                href="{{ route('superadmin.tentangkami.senat.index') }}">@yield('title')</a></li>
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
                    <!-- Ketua Card -->
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ketua dan Sekertaris Senat</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row text-center">
                                @foreach ($senat as $item)
                                    <div class="col mx-auto">
                                        <p><img src="{{ asset('storage/images/senat/' . $item->foto) }}" alt="ketua"
                                                style="max-width: 250px ;"></p>
                                        <h6>{{ $item->name }}</h6>
                                        <p>{{ $item->kedudukanSenat }}</p>
                                        <div class="col-3">
                                            <a href="{{ route('superadmin.tentangkami.senat.ketua.edit', $item->id) }}"
                                                class="btn btn-block btn-info btn-sm">Edit</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- Komisi A Card -->
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Komisi A</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                @foreach ($komisiA as $item)
                                    @if ($item->foto)
                                        <div class="col mx-auto text-center">
                                            <p><img src="{{ asset('storage/images/senat/' . $item->foto) }}" alt="ketua"
                                                    style="max-width: 250px ;"></p>
                                            <h6>{{ $item->name }}</h6>
                                            <p>{{ $item->kedudukanSenat }}</p>
                                            <div class="col-3">
                                                <a href="{{ route('superadmin.tentangkami.senat.ketua.edit', $item->id) }}"
                                                    class="btn btn-block btn-info btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col">
                                            <p>{!! $item->name !!}</p>
                                            <div class="col-3">
                                                <a href="{{ route('superadmin.tentangkami.senat.anggota.edit', $item->id) }}"
                                                    class="btn btn-block btn-info btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- Komisi B Card -->
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Komisi B</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                @foreach ($komisiB as $item)
                                    @if ($item->foto)
                                        <div class="col mx-auto text-center">
                                            <p><img src="{{ asset('storage/images/senat/' . $item->foto) }}" alt="ketua"
                                                    style="max-width: 250px ;"></p>
                                            <h6>{{ $item->name }}</h6>
                                            <p>{{ $item->kedudukanSenat }}</p>
                                            <div class="col-3">
                                                <a href="{{ route('superadmin.tentangkami.senat.ketua.edit', $item->id) }}"
                                                    class="btn btn-block btn-info btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col">
                                            <p>{!! $item->name !!}</p>
                                            <div class="col-3">
                                                <a href="{{ route('superadmin.tentangkami.senat.anggota.edit', $item->id) }}"
                                                    class="btn btn-block btn-info btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- Komisi A Card -->
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Komisi C</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                @foreach ($komisiC as $item)
                                    @if ($item->foto)
                                        <div class="col mx-auto text-center">
                                            <p><img src="{{ asset('storage/images/senat/' . $item->foto) }}" alt="ketua"
                                                    style="max-width: 250px ;"></p>
                                            <h6>{{ $item->name }}</h6>
                                            <p>{{ $item->kedudukanSenat }}</p>
                                            <div class="col-3">
                                                <a href="{{ route('superadmin.tentangkami.senat.ketua.edit', $item->id) }}"
                                                    class="btn btn-block btn-info btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col">
                                            <p>{!! $item->name !!}</p>
                                            <div class="col-3">
                                                <a href="{{ route('superadmin.tentangkami.senat.anggota.edit', $item->id) }}"
                                                    class="btn btn-block btn-info btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
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
    @endpush




@endsection
