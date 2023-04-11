@extends('back.layouts.main')

@section('title', 'Sambutan')

@push('css')
<link rel="stylesheet" href="{{ asset('vendor/summernote/summernote.min.css') }}">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Settings</a></li> --}}
                <li class="breadcrumb-item"><a href="{{ route('admin.pages.sambutan.index') }}">Sambutan</a></li>
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
                <form action="{{ isset($dataSambutan) ? route('admin.pages.sambutan.update') : route('admin.pages.sambutan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($dataSambutan))
                    {{ method_field('PUT') }}
                    @endif

                    <div class="form-group">
                      <label for="nama">Nama Kepala Prodi*</label>
                      <input type="text" name="nama" class="form-control" required autofocus value="{{ old('nama') ?? $dataNama->value ?? null }}">
                    </div>

                    <div class="form-group">
                      <label for="foto" class="form-label">Foto*</label>
                      @if (isset($dataFoto))
                          <p class="text-danger">Jangan upload foto jika tidak ingin update gambar</p>
                          <p><img src="{{ asset('storage/images/detailProdi/'.auth()->user()->prodi_id.'/'.$dataFoto->value) }}" alt="" style="width: 10%"></p>
                      @endif
                      <input type="file" name="foto" class="form-control col-md-3" value="{{{ old('foto') ?? $dataFoto->value ?? null }}}"@if (!isset($dataFoto->value)) required @endif>
                    </div>

                    <div class="form-group">
                      <label for="name">Sambutan</label><br>
                      <textarea class="form-control" name="sambutan" id="summernote" rows="20" cols="100" required>{{{ old('sambutan') ?? $dataSambutan->value ?? null }}}</textarea>
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

        @push('js')
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
                    ]
                  });
                })
            </script>
        @endpush

@endsection