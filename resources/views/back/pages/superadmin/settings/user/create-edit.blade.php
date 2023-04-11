@extends('back.layouts.main')

@section('title', 'User')

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
                <li class="breadcrumb-item"><a href="{{ route('superadmin.settings.user.index') }}">@yield('title')</a></li>
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
                <form action="{{ isset($data) ? route('superadmin.settings.user.update', $data->id) : route('superadmin.settings.user.store') }}" method="POST">
                    @csrf
                    @if(isset($data))
                    {{ method_field('PUT') }}
                    @endif

                    <div class="form-group">
                      <label for="name">Nama Lengkap</label>
                      <input type="text" id="name" name="name" class="form-control" autofocus value="{{{ old('name') ?? $data->name ?? null }}}">
                      @error('name')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control" autofocus value="{{{ old('email') ?? $data->email ?? null }}}">
                      @error('email')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect" class="form-label">Role User</label>
                        <br>
                          <select id="role_id" class="form-control @error('role_id') is-invalid @enderror" name="role_id" autofocus>
                            @if (isset($data))
                            <option value="{{ $data->role_id }}" selected> {{ $data->role->name }}</option>
                            @else
                            <option value="" selected>Pilih Role</option>
                            @endif
                            @foreach ($roles as $role)
                                  <option value="{{old('role_id') ?? $role->id }}" >{{ $role->name }}</option>  
                            @endforeach
                          </select>
                            @error('role_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                      <div id="2">
                        <div class="form-group">
                            <label for="disabledSelect" class="form-label">Prodi</label>
                            <br>
                              <select id="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror" name="prodi_id" autofocus required>
                                @if (isset($data))
                                <option value="{{ $data->prodi_id }}" selected> {{ $data->prodi->name }}</option>
                                @else
                                <option value="" selected>Pilih Prodi</option>
                                @endif
                                @foreach ($prodis as $prodi)
                                      <option value="{{old('prodi_id') ?? $prodi->id }}" >{{ $prodi->name }}</option>  
                                @endforeach
                              </select>
                                @error('prodi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                      </div>
                    <a class="btn btn-secondary randpass mt-4">Generate</a>
                    @if (isset($data))
                        <p class="text text-danger">*Jangan isi bila tidak merubah password</p>
                    @endif
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="password1">Re-Type Password</label>
                        <input type="password" class="form-control" id="password1" name="password1">
                      </div>
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

        <script>

          //hide all in prodi div
          $("div#2").empty();
          $("select#role_id").change(function(){
              // hide previously shown in prodi div
              $("div#2").empty();

              // read id from your select
              var value = $(this).val();

              var temp_html = `
              <div id="2">
                        <div class="form-group">
                            <label for="disabledSelect" class="form-label">Prodi</label>
                            <br>
                              <select id="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror" name="prodi_id" autofocus required>
                                @if (isset($data))
                                <option value="{{ $data->prodi_id }}" selected> {{ $data->prodi->name }}</option>
                                @else
                                <option value="" selected>Pilih Prodi</option>
                                @endif
                                @foreach ($prodis as $prodi)
                                      <option value="{{old('prodi_id') ?? $prodi->id }}" >{{ $prodi->name }}</option>  
                                @endforeach
                              </select>
                                @error('prodi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                      </div>
              `;

              // show rlrment with selected id
              $("div#"+value).append(temp_html);
          });

          $(document).on('click','.randpass', function () {
            var password = document.getElementById("password");
            var chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            var passwordLength = 12;
            var password = "";

            for (var i = 0; i <= passwordLength; i++) {
              var randomNumber = Math.floor(Math.random() * chars.length);
              password += chars.substring(randomNumber, randomNumber +1);
            }
            

            document.getElementById("password").type = 'text';
            document.getElementById("password1").type = 'text';
            

            document.getElementById("password").value = password;
            document.getElementById("password1").value = password;

          });
        </script>
        @endpush
@endsection