@extends('back.layouts.main')

@section('title', 'Berita')

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
                <li class="breadcrumb-item"><a href="{{ route('humas.manajemen-berita.berita.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('humas.manajemen-berita.berita.update', $data->id) : route('humas.manajemen-berita.berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" id="judul" name="judul" class="form-control" autofocus required value="{{{ old('judul') ?? $data->judul ?? null }}}">
                        @error('judul')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="konten">Konten</label><br>
                      <textarea class="form-control" name="konten" id="summernote" rows="20" cols="100" required>{{{ old('konten') ?? $data->konten ?? null }}}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="disabledSelect" class="form-label">Kategori</label>
                        <div class="select2-purple">
                            <select id="kategori" class="select2" name="kategori_id[]" data-placeholder="Select a State" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;" aria-selected="">
                              @foreach ($kategoris as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="foto_header" class="form-label">Foto Header</label>
                        @if (isset($data))
                            <p><img src="{{ asset('storage/images/'.$data->foto_header) }}" alt="" style="width: 20%"></p>
                        @endif
                        <input type="file" name="foto_header" class="form-control col-md-3" value="{{{ old('foto_header') ?? $data->foto_header ?? null }}}">
                    </div>
                    {{ Form::submit('Publish', array('class' => 'btn btn-success float-right', 'name' => 'submitbutton')) }}
                    {{ Form::submit('Save as draft', array('class' => 'btn btn-secondary float-right mr-3', 'name' => 'submitbutton')) }}
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
                    @if(isset($kategoriSelected))
                    var data = {!! json_encode($kategoriSelected, JSON_HEX_TAG) !!}
                    @endif
                    //Initialize Select2 Elements
                    $('.select2').select2() 
                    $('#kategori').val(data).trigger('change')
                    // $.each($('#kategori'), function(){
                    //   $(this).select2('val', selecteedValues)
                    // })
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