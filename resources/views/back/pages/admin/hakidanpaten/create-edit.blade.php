@extends('back.layouts.main')

@section('title', 'Haki dan Paten')

@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

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
                <li class="breadcrumb-item"><a href="{{ route('admin.hakidanpaten.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('admin.hakidanpaten.update', $data->id) : route('admin.hakidanpaten.store') }}" method="POST">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif
                    <div class="form-group">
                        <label for="haki">Haki atau Paten<span class="text-danger">*</span></label>
                        <input type="text" id="haki" name="haki" class="form-control" autofocus required value="{{{ old('haki') ?? $data->haki ?? null }}}" placeholder="Haki atau haki">
                        @error('haki')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="grup_id">Grup Riset <span class="text-danger">*</span></label>
                      <select id="grup_id" name="grup_id" class="form-control" autofocus required>
                        <option value="" selected>Grup Riset</option>
                        @foreach ($grup as $item)
                          <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                        @endforeach
                      </select>
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

        {{-- @push('js')
        <!--Summernote-->
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
        @endpush --}}

@endsection