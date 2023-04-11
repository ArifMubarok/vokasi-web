@extends('back.layouts.main')

@section('title', 'Dosen')

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
                <li class="breadcrumb-item"><a href="{{ route('admin.sdm.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('admin.sdm.update', $data->id) : route('admin.sdm.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif
                    <div class="form-group">
                        <label for="name">Nama*</label>
                        <input type="text" id="name" name="name" class="form-control" autofocus required value="{{{ old('name') ?? $data->name ?? null }}}" placeholder="Nama">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" autofocus value="{{{ old('email') ?? $data->email ?? null }}}" placeholder="example@staff.uns.ac.id">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="link_iris">Link Iris1103</label>
                        <input type="text" id="link_iris" name="link_iris" class="form-control" autofocus value="{{{ old('link_iris') ?? $data->link_iris ?? null }}}" placeholder="https://iris1103.uns.ac.id/profil-number.asm">
                        @error('link_iris')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="foto" class="form-label">Foto</label>
                      @if (isset($data))
                          <p class="text-danger">*Jangan upload foto jika tidak ingin diganti</p>
                          <p><img src="{{ asset('storage/images/sdm_prodi/'.$data->foto) }}" alt="" style="width: 20%"></p>
                      @endif
                      <input type="file" name="foto" class="form-control col-md-3" value="{{{ old('foto') ?? $data->foto ?? null }}}">
                    </div>
                    <div class="form-group">
                      <label for="posisi" class="form-label">Posisi*</label>
                      <br>
                        <select id="posisi" class="form-control @error('posisi') is-invalid @enderror" name="posisi" autofocus required>
                          @if (isset($data))
                          <option value="{{ $data->posisi }}" selected> {{ $data->posisi }}</option>
                          @else
                          <option value="" selected>Pilih Role</option>
                          @endif
                          <option value="dosen">Dosen</option>
                          <option value="admin">Admin</option>
                        </select>
                          @error('posisi')
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