@extends('back.layouts.main')

@section('title', 'Produk Unggulan')

@push('css')
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
                <li class="breadcrumb-item"><a href="{{ route('superadmin.produk.produk-unggulan.index') }}">@yield('title')</a></li>
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
                <form action="{{ route('superadmin.produk.produk-unggulan.update',$data->id) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                      <p>Cara mengambil link youtube:</p>
                      <ol>
                        <li>Pergi ke <a href="https://www.youtube.com/">Youtube</a></li>
                        <li>Cari video</li>
                        <li>Klik share button pada video tersebut</li>
                        <li>Pilih embed</li>
                        <li>Klik Copy</li>
                      </ol>
                      <label for="value">Profile Singkat</label><br>
                      <input class="form-control" name="value" id="value" value="{{ old('value') ?? $data->value ?? null }}}" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Update</button>
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