@extends('back.layouts.main')

@section('title', 'Produk Unggulan')

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
                <li class="breadcrumb-item"><a href="{{ route('admin.produk-unggulan.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('admin.produk-unggulan.update', $data->id) : route('admin.produk-unggulan.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif
                    <div class="form-group">
                      <label for="produk">Produk<span class="text-danger">*</span></label>
                      <input type="text" id="produk" name="produk" class="form-control" autofocus required value="{{{ old('produk') ?? $data->produk ?? null }}}" placeholder="Produk Unggulan Prodi">
                      @error('produk')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="leaflet" class="form-label">Leaflet <span class="text-danger">*</span></label>
                      @if (isset($data))
                          <p><img src="{{ asset('storage/images/produk-unggulan/'.$data->leaflet) }}" alt="" style="width: 20%"></p>
                      @endif
                      <input type="file" name="leaflet" class="form-control col-md-3" value="{{{ old('leaflet') ?? $data->leaflet ?? null }}}">
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