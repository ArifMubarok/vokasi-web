@extends('back.layouts.main')

@section('title', 'IKAPRODI')

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
                <li class="breadcrumb-item"><a href="{{ route('superadmin.mahasiswa.ikaprodi.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('superadmin.mahasiswa.ikaprodi.update', $data->id) : route('superadmin.mahasiswa.ikaprodi.store') }}" method="POST">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif

                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" id="nama" name="nama" class="form-control" autofocus required value="{{{ old('nama') ?? $data->nama ?? null }}}" placeholder="Nama IKAPRODI">
                      @error('nama')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="informasi">informasi</label>
                      <input type="text" class="form-control" name="informasi" value="{{{old('informasi') ?? $data->informasi ?? null}}}" autofocus required placeholder="Bisa diarahkan ke media sosial atau website alumni yang bersangkutan">
                      @error('informasi')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="disabledSelect" class="form-label">Prodi</label>
                      <br>
                        <select id="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror" name="prodi_id" autofocus required>
                          @if (isset($data))
                          <option value="{{ $data->prodi_id }}" selected> {{ $data->prodi->name }}</option>
                          @else
                          <option value="" selected>Pilih Prodi</option>
                          @endif
                          @foreach ($prodis as $prodi)
                                <option value="{{old('prodi_id') ?? $prodi->id }}" >{{ $prodi->name }}</option>  
                          @endforeach
                        </select>
                          @error('prodi_id')
                              <div class="invalid-feedback">{{ $message }}</div>
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