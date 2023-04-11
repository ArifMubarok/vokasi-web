@extends('back.layouts.main')

@section('title', 'Pinjam Ruang')

@push('css')
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
                <li class="breadcrumb-item"><a
                    href="{{ route('superadmin.layanan.non-akademik.pinjam-ruang.index') }}">@yield('title')</a>
                </li>
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
                <form action="{{ route('superadmin.layanan.non-akademik.pinjam-ruang.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                      <label for="value" class="form-label">Foto Pinjam Ruang</label>
                      @if (isset($data))
                          <p><img src="{{ asset('storage/images/pinjam-ruang/' . $data->value) }}" alt="" style="width: 50%"></p>
                      @endif
                      <input type="file" name="value" class="form-control col-md-3" value="{{{ old('value') ?? $data->value ?? null }}}">
                    </div>
                    {{ Form::submit('Update Picture', array('class' => 'btn btn-success float-right', 'name' => 'submitbutton')) }}
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