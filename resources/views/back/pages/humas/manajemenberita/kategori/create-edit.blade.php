@extends('back.layouts.main')

@section('title', 'Kategori Berita')

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
              <h1>Tambah @yield('title')</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Settings</a></li> --}}
                <li class="breadcrumb-item"><a href="{{ route('humas.manajemen-berita.kategori.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('humas.manajemen-berita.kategori.update', $data->id) : route('humas.manajemen-berita.kategori.store') }}" method="POST">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif

                    <div class="form-group">
                      <label for="name">Kategori</label>
                      <input type="text" id="name" name="name" class="form-control" autofocus required value="{{{ old('name') ?? $data->name ?? null }}}">
                      @error('name')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    @if (isset($data))
                    <div class="form-group">
                        <label for="disabledSelect" class="form-label">Status</label>
                        <br>
                          <select id="tingkat" class="form-control @error('tingkat') is-invalid @enderror" name="tingkat" autofocus>
                            <option value="0">Non Aktif</option>
                            <option value="1" selected>Aktif</option>
                          </select>
                            @error('tingkat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    @endif
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