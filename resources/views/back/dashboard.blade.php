@extends('back.layouts.main')

@section('title', 'Dashboard')

@if (auth()->user()->role_id == 2)
@push('css')

@livewireStyles
@endpush

@endif

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              </ol>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>
      
      <!-- Main content -->
      <section class="content">
        
        <div class="container-fluid">
          <div class="row">
            @if (isset($prodi))
            <div class="col-md-3 offset-md-9">
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Status</h3>
                </div>
                <div class="card-body">
                  @livewire('prodi-status', ['model' => $prodi, 'field' => 'isActive'], key(auth()->user()->prodi_id))
                </div>
              </div>
            </div>
            @endif
            <div class="col-md-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Title</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  Start creating your amazing application!
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  Footer
                </div>
                <!-- /.card-footer-->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->

    


@endsection

@if (auth()->user()->role_id == 2)

@push('js')
@livewireScripts

<!-- Bootstrap Switch -->
<script src="{{ asset('assets/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
@endpush

@endif