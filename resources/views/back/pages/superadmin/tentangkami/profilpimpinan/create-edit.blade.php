@extends('back.layouts.main')

@section('title', 'Profil Pimpinan')

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
                <li class="breadcrumb-item"><a href="{{ route('superadmin.tentangkami.profil-pimpinan.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('superadmin.tentangkami.profil-pimpinan.update', $data->id) : route('superadmin.tentangkami.profil-pimpinan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif
                    <div class="form-group">
                        <label for="name">Nama*</label>
                        <input type="text" id="name" name="name" class="form-control" autofocus required value="{{{ old('name') ?? $data->name ?? null }}}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="profil">Profil*</label><br>
                      <textarea class="form-control" name="profil" id="summernote" rows="20" cols="100" required>{{{ old('profil') ?? $data->profil ?? null }}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">Posisi*</label>
                        <select name="title" class="form-control @error('title') is-invalid @enderror" required >
                          <option value="">Pilih Posisi</option>
                          <option value="1">Dekan/Wakil Dekan</option>
                          <option value="2">Senat Akademik</option>
                          <option value="3">Koordinator</option>
                          <option value="4">Penjamin Mutu</option>
                          <option value="5">Unsur Lain</option>
                          <option value="6">Kepala Program Studi</option>
                          <option value="7">Kepala Laboratorium</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kedudukan">Detail Posisi*</label>
                        <input type="text" id="kedudukan" name="kedudukan" class="form-control" autofocus required value="{{{ old('kedudukan') ?? $data->kedudukan ?? null }}}" placeholder="ex. Koordinator Tata Usaha">
                        @error('kedudukan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto" class="form-label">Foto*</label>
                        @if (isset($data))
                            <p><img src="{{ asset('storage/images/'.$data->foto) }}" alt="" style="width: 20%"></p>
                        @endif
                        <input type="file" name="foto" class="form-control col-md-3" value="{{{ old('foto') ?? $data->foto ?? null }}}"@if (!isset($data->foto)) required @endif>
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

            {{-- Summernote --}}
            <script type="text/javascript" src="{{ asset('vendor/summernote/summernote.min.js') }}"></script>
            <script>
                $(document).ready(function(){
                  $('#summernote').summernote({
                    toolbar: [
                      // [groupName, [list of button]]
                      ['style', ['bold', 'italic', 'underline', 'clear']],
                      ['font', ['strikethrough', 'superscript', 'subscript']],
                      ['fontsize', ['fontsize']],
                      ['color', ['color']],
                      ['para', ['ul', 'ol', 'paragraph']],
                      ['height', ['height']],
                      ['view', ['help']],
                      ['insert', ['link', 'picture']]
                    ]
                  });
                })
            </script>
        @endpush

@endsection