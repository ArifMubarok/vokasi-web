@extends('back.layouts.main')

@section('title', 'Akreditasi')

@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/daterangepicker/daterangepicker.css') }}">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
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
                <li class="breadcrumb-item"><a href="{{ route('superadmin.tentangkami.akreditasi.index') }}">@yield('title')</a></li>
              </ol>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-11 mt-4 mx-auto">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form @yield('title')</h3>
              </div>
              <div class="card-body" style="display: block;">
                <form action="{{ isset($data) ? route('superadmin.tentangkami.akreditasi.update', $data->id) : route('superadmin.tentangkami.akreditasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif
                    <div class="form-group">
                        <label for="prodi">Program Studi*</label>
                        <input type="text" id="prodi" name="prodi" class="form-control" autofocus required value="{{{ old('prodi') ?? $data->prodi ?? null }}}" placeholder="Program Studi">
                        @error('prodi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="akreditasi">Akreditasi*</label>
                        <select name="akreditasi" id="akreditasi" class="form-control" required autofocus>
                          @if (isset($data))
                            <option value="{{ $data->akreditasi }}">{{ $data->akreditasi }}</option>
                          @else
                            <option value="">Pilih</option>
                          @endif
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="*">*</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nomorAkreditas">Nomor Akreditasi</label>
                        <input type="text" id="nomorAkreditas" name="nomorAkreditas" class="form-control" autofocus required value="{{{ old('nomorAkreditas') ?? $data->nomorAkreditas ?? null }}}" placeholder="Nomor">
                        @error('nomorAkreditas')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="masa">Masa Berlaku</label>
                      <div class="input-group date" id="calendarr" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="masa" data-target="#calendarr" data-toggle="datetimepicker" value="{{{ old('masa') ?? $data->masa ?? null }}}"/>
                        <div class="input-group-append" >
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                    <a href="javascript:history.back(-1);" class="btn btn-primary">Back</a>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </section>
        {{-- end content --}}

        @push('js')
            <!-- InputMask -->
            <script src="{{ asset('assets/adminlte/plugins/moment/moment.min.js') }}"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="{{ asset('assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
            <!-- date-range-picker -->
            <script src="{{ asset('assets/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
            <!-- Select2 -->
            <script src="{{ asset('assets/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
            <script>
                $(function () {
                    //Initialize Select2 Elements
                    $('.select2').select2() 

                    //Date picker
                    $('#calendarr').datetimepicker({
                        format: 'L'
                    });
                })
            </script>
        @endpush

@endsection