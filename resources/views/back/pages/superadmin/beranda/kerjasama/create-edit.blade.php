@extends('back.layouts.main')

@section('title', 'Kerjasama')

@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

{{-- Summernote --}}
<link rel="stylesheet" href="{{ asset('vendor/summernote/summernote.min.css') }}">
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
                <li class="breadcrumb-item"><a href="{{ route('superadmin.tentangkami.kerjasama.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('superadmin.tentangkami.kerjasama.update', $data->id) : route('superadmin.tentangkami.kerjasama.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif
                    
                    <div class="form-group">
                        <label for="instansi">Instansi*</label>
                        <input type="text" id="instansi" name="instansi" class="form-control" autofocus required value="{{{ old('instansi') ?? $data->instansi ?? null }}}" placeholder="Instansi">
                        @error('instansi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="link">Link Institusi*</label>
                        <input type="text" id="link" name="link" class="form-control" autofocus required value="{{{ old('link') ?? $data->link ?? null }}}" required>
                        @error('link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="logo" class="form-label">Logo Mitra*</label>
                        @if (isset($data))
                        <p class="text-danger">*Jangan upload logo apabila tidak ingin dirubah</p>
                        <p><img src="{{ asset('storage/images/kerjasama/'.$data->logo) }}" alt="" style="width: 20%"></p>
                        @endif
                        <input type="file" name="logo" class="form-control col-md-3" value="{{{ old('logo') ?? $data->logo ?? null }}}" required>
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
            <!-- Select2 -->
            <script src="{{ asset('assets/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
            <script>
                $(function () {
                    //Initialize Select2 Elements
                    $('.select2').select2() 
                })
            </script>
        @endpush

@endsection