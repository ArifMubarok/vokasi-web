@extends('back.layouts.main')

@section('title', 'Fasilitas Ruang')

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
                <li class="breadcrumb-item"><a href="{{ route('superadmin.layanan.fasilitas-kampus.ruang.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('superadmin.layanan.fasilitas-kampus.ruang.update', $data->id) : route('superadmin.layanan.fasilitas-kampus.ruang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif

                    <div class="form-group">
                      <label for="disabledSelect" class="form-label">Ruang<span class="text-red">*</span></label>
                      <br>
                        <select id="ruang_id" class="form-control @error('ruang_id') is-invalid @enderror" name="ruang_id" autofocus>
                          @if (isset($data))
                          <option value="{{ $data->ruang_id }}" selected>Ruang {{ $data->ruang->name }}</option>
                          @else
                          <option value="" selected>Pilih Ruang</option>
                          @endif
                          @foreach ($ruang as $item)
                                <option value="{{ $item->id }}" >Ruang {{ $item->name }}</option>  
                          @endforeach
                        </select>
                          @error('ruang_id')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                    <div class="form-group">
                        <label for="gambar" class="form-label">Image</label>
                        @if (isset($data->gambar))
                          <p class="text-danger">*Jangan upload apabila tidak ingin mengganti gambar</p>
                          <p><img src="{{ asset('storage/content/fasilitas/ruang/'.$data->gambar) }}" alt="" style="width: 20%"></p>
                        @endif
                        <input type="file" name="gambar" class="form-control col-md-3" value="{{{ old('gambar') ?? $data->gambar ?? null }}}">
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