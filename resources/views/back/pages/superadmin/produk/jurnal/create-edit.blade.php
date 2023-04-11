@extends('back.layouts.main')

@section('title', 'Jurnal')

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
                <li class="breadcrumb-item"><a href="{{ route('superadmin.produk.jurnal.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('superadmin.produk.jurnal.update', $data->id) : route('superadmin.produk.jurnal.store') }}" method="POST">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif
                    <div class="form-group">
                        <label for="nama">Nama Jurnal<span class="text-danger">*</span></label>
                        <input type="text" id="nama" name="nama" class="form-control" autofocus required value="{{{ old('nama') ?? $data->nama ?? null }}}">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="disabledSelect" class="form-label">Terakreditasi</label>
                      <select id="pilih" class="form-control" autofocus required>
                        <option value="" selected>Apakah Terakreditasi</option>
                        <option value="1" >Sudah</option>  
                        <option value="0" >Belum</option>  
                      </select>
                    </div>
                    <div id="1">
                        <div class="form-group">
                            <label for="terakreditasi">Akreditasi</label>
                            <input type="text" id="terakreditasi" name="terakreditasi" class="form-control" autofocus required >
                                @error('terakreditasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
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
                //hide all in terakreditasi
          $("div#1").empty();
          $("select#pilih").change(function(){
              // hide previously shown in terakreditasi
              $("div#1").empty();

              // read id from your select
              var value = $(this).val();

              var temp_html = `
                    <div id="1">
                      <div class="form-group">
                        <label for="terakreditasi">Akreditasi</label>
                        <input type="text" id="terakreditasi" name="terakreditasi" class="form-control" autofocus >
                                @error('terakreditasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
              `;

              // show rlrment with selected id
              $("div#"+value).append(temp_html);
          });
            </script>

            {{-- Summernote --}}
            <script type="text/javascript" src="{{ asset('vendor/summernote/summernote.min.js') }}"></script>
            <script>
                $(document).ready(function(){
                  $('#summernote').summernote({
                    disableDragAndDrop:true,
                    toolbar: [
                      // [groupName, [list of button]]
                      ['style', ['bold', 'italic', 'underline', 'clear']],
                      ['font', ['strikethrough', 'superscript', 'subscript']],
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