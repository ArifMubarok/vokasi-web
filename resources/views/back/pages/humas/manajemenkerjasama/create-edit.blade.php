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
                <li class="breadcrumb-item"><a href="{{ route('humas.manajemen-kerjasama.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('humas.manajemen-kerjasama.update', $data->id) : route('humas.manajemen-kerjasama.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif

                    <div class="form-group">
                      <label for="name">Nama Institusi*</label>
                      <input type="text" id="name" name="name" class="form-control" autofocus required value="{{{ old('name') ?? $data->name ?? null }}}" required>
                      @error('name')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                    <div class="form-group">
                      <label for="foto" class="form-label">Foto*</label>
                      @if (isset($data))
                      <p class="text-danger">*Jangan upload foto apabila tidak ingin dirubah</p>
                      <p><img src="{{ asset('storage/images/kerjasama/'.$data->foto) }}" alt="" style="width: 20%"></p>
                      @endif
                      <input type="file" name="foto" class="form-control col-md-3" value="{{{ old('foto') ?? $data->foto ?? null }}}" required>
                    </div>
                    <div class="form-group">
                        <label for="link">Link Institusi*</label>
                        <input type="text" id="link" name="link" class="form-control" autofocus required value="{{{ old('link') ?? $data->link ?? null }}}" required>
                        @error('link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                    <button type="reset" class="btn btn-secondary float-right mr-3">Reset</button>
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