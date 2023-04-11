@extends('back.layouts.main')

@section('title', 'Informasi Umum')

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
                <li class="breadcrumb-item"><a href="{{ route('admin.informasi.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('admin.informasi.update', $data->id) : route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif
                    <div class="form-group">
                        <label for="header">Header*</label>
                        <input type="text" id="header" name="header" class="form-control" autofocus required value="{{{ old('header') ?? $data->header ?? null }}}" placeholder="Gelar dan Strata">
                        @error('header')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @if (isset($data))
                        @if ($data->header == "Link")
                        <div class="form-group">
                          <label for="value">Value*</label>
                          <textarea class="form-control" name="value" rows="20" cols="100" required>{{{ old('value') ?? $data->value ?? null }}}</textarea>
                          @error('value')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        @endif
                    @else
                    <div class="form-group">
                      <label for="value">Value*</label>
                      <textarea class="form-control" name="value" id="summernote" rows="20" cols="100" required>{{{ old('value') ?? $data->value ?? null }}}</textarea>
                      @error('value')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
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
        {{-- Summernote --}}
        <script type="text/javascript" src="{{ asset('vendor/summernote/summernote.min.js') }}"></script>
        <script>
            $(document).ready(function(){
              $('#summernote').summernote({
                disableDragAndDrop: true,
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