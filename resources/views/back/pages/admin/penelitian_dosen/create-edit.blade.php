@extends('back.layouts.main')

@section('title', 'Penelitian Dosen')

@push('css')
<!-- Select2 -->
{{-- <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"> --}}

{{-- Summernote --}}
{{-- <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote.min.css') }}"> --}}
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
                <li class="breadcrumb-item"><a href="{{ route('admin.penelitian-dosen.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('admin.penelitian-dosen.update', $data->id) : route('admin.penelitian-dosen.store') }}" method="POST">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif
                    <div class="form-group">
                      <label for="nidn">NIDN<span class="text-danger">*</span></label>
                      <input type="number" id="nidn" name="nidn" class="form-control" autofocus required value="{{{ old('nidn') ?? $data->nidn ?? null }}}">
                      @error('nidn')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="dosen">Nama Dosen<span class="text-danger">*</span></label>
                      <input type="text" id="dosen" name="dosen" class="form-control" autofocus required value="{{{ old('dosen') ?? $data->dosen ?? null }}}">
                      @error('dosen')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="judul">Judul<span class="text-danger">*</span></label>
                      <input type="text" id="judul" name="judul" class="form-control" autofocus required value="{{{ old('judul') ?? $data->judul ?? null }}}">
                      @error('judul')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="skim">SKIM<span class="text-danger">*</span></label>
                      <input type="text" id="skim" name="skim" class="form-control" autofocus required value="{{{ old('skim') ?? $data->skim ?? null }}}">
                      @error('skim')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="jenis">Jenis<span class="text-danger">*</span></label>
                      <input type="text" id="jenis" name="jenis" class="form-control" autofocus required value="{{{ old('jenis') ?? $data->jenis ?? null }}}">
                      @error('jenis')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="tahun">Tahun<span class="text-danger">*</span></label>
                      <input type="number" id="tahun" name="tahun" class="form-control" autofocus required value="{{{ old('tahun') ?? $data->tahun ?? null }}}">
                      @error('tahun')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="bidang_ilmu">Bidang Ilmu<span class="text-danger">*</span></label>
                      <input type="text" id="bidang_ilmu" name="bidang_ilmu" class="form-control" autofocus required value="{{{ old('bidang_ilmu') ?? $data->bidang_ilmu ?? null }}}">
                      @error('bidang_ilmu')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="pendanaan">pendanaan<span class="text-danger">*</span></label>
                      <input type="text" id="pendanaan" name="pendanaan" class="form-control" autofocus required value="{{{ old('pendanaan') ?? $data->pendanaan ?? null }}}">
                      @error('pendanaan')
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