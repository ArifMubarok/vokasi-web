@extends('back.layouts.main')

@section('title', 'Program Studi')

@push('css')

<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Tambah Program Studi</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Settings</a></li> --}}
                <li class="breadcrumb-item"><a href="{{ route('superadmin.settings.prodi.index') }}">Program Studi</a></li>
              </ol>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">

            </div>
          <div class="col-md-6 mt-4 mx-auto">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form @yield('title')</h3>
  
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" style="display: block;">
                <form action="{{ isset($data) ? route('superadmin.settings.prodi.update', $data->id) : route('superadmin.settings.prodi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif

                    <div class="form-group">
                      <label for="name">Nama Prodi</label>
                      <input type="text" id="name" name="name" class="form-control" autofocus value="{{{ old('name') ?? $data->name ?? null }}}">
                      @error('name')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect" class="form-label">Tingkat (Diploma)</label>
                        <br>
                          <select id="tingkat" class="form-control @error('tingkat') is-invalid @enderror" name="tingkat" autofocus>
                            @if (isset($data))
                            <option value="{{ $data->tingkat }}" selected>Diploma {{ $data->tingkat }}</option>
                            @else
                            <option value="" selected>Pilih Tingkat Diploma</option>
                            @endif
                            @foreach ($tingkats as $tingkat)
                                  <option value="{{ $tingkat->tingkat }}" >Diploma {{ $tingkat->tingkat }}</option>  
                            @endforeach
                          </select>
                            @error('tingkat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="logo" class="form-label">Logo</label>
                        @if (isset($data->logo))
                          <p class="text-danger">*Jangan upload apabila tidak ingin mengganti logo</p>
                          <p><img src="{{ asset('storage/settings/prodi/logo/'.$data->logo) }}" alt="" style="width: 20%"></p>
                        @endif
                        <input type="file" name="logo" class="form-control col-md-3" value="{{{ old('logo') ?? $data->logo ?? null }}}">
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
          <div class="col">
          </div>
        </section>
        {{-- end content --}}

        @push('js')
        <!-- SweetAlert2 -->
        <script src="{{ asset('assets/adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script>
          var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });

          @if(Session::has('error'))
            Toast.fire({
            icon: 'error',
            title: 'Error when submit to system!'
            })
          @endif
        </script>
        

        {{-- <script>
          @if(Session::has('message'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
              toastr.success("{{ session('message') }}");
          @endif
        
          @if(Session::has('error'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
              toastr.error("{{ session('error') }}");
          @endif
        
          @if(Session::has('info'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
              toastr.info("{{ session('info') }}");
          @endif
        
          @if(Session::has('warning'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
              toastr.warning("{{ session('warning') }}");
          @endif
        </script> --}}
        @endpush
@endsection