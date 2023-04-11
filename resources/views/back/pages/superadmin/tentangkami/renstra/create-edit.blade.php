@extends('back.layouts.main')

@section('title', 'Renstra SV')

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
                <li class="breadcrumb-item"><a href="{{ route('superadmin.tentangkami.renstra.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('superadmin.tentangkami.renstra.update', $data->id) : route('superadmin.tentangkami.renstra.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif

                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" id="name" name="name" class="form-control" autofocus required value="{{{ old('name') ?? $data->name ?? null }}}">
                      @error('name')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <textarea class="form-control" name="deskripsi"> {{{old('deskripsi') ?? $data->deskripsi ?? null}}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="cover" class="form-label">Cover</label>
                        @if (isset($data->cover))
                          <p class="text-danger">*Jangan upload apabila tidak ingin mengganti cover</p>
                          <p><img src="{{ asset('storage/content/renstra/cover/'.$data->cover) }}" alt="" style="width: 20%"></p>
                        @endif
                        <input type="file" name="cover" class="form-control col-md-3" value="{{{ old('cover') ?? $data->cover ?? null }}}">
                    </div>
                    <div class="form-group">
                        <label for="file" class="form-label">File</label>
                        @if (isset($data->file))
                          <p class="text-danger">*Jangan upload apabila tidak ingin mengganti file</p>
                        @endif
                        <input type="file" name="file" class="form-control col-md-3" value="{{{ old('file') ?? $data->file ?? null }}}">
                    </div>

                    @if (isset($data))
                    <div class="form-group">
                      <iframe src="{{ asset('storage/content/file/'. $data->value) }}" width="50%" height="600">
                        This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('storage/content/file/'. $data->value) }}">Download PDF</a>
                      </iframe>
                    </div>
                    @endif
                    
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