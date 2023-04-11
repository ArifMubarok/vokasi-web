@extends('back.layouts.main')

@section('title', 'Dokumen Akreditasi')

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
                <li class="breadcrumb-item"><a href="{{ route('admin.akreditasi.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('admin.akreditasi.update', $data->id) : route('admin.akreditasi.store') }}" method="POST">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif
                    
                    <div class="form-group">
                        <label for="name">Nama dan tahun akreditasi<span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" autofocus required value="{{{ old('name') ?? $data->name ?? null }}}" placeholder="Contoh. Akreditasi BAN-PT (2009-2013)">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="link">Link<span class="text-danger">*</span></label>
                        <p class="text-muted">*Masukkan link dari google drive</p>
                        <input type="text" id="link" name="link" class="form-control" autofocus required value="{{{ old('link') ?? $data->link ?? null }}}" placeholder="Google drive link">
                        @error('link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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

@endsection