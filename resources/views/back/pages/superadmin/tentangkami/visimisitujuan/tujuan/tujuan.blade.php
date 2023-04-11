<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $tujuan->name }}</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col mx-3">
                {!! $tujuan->value !!}
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-1 ml-3"><a
                    href="{{ route('superadmin.tentangkami.visi-misi-tujuan.tujuan.edit', $tujuan->id) }}"
                    class="btn btn-block btn-info btn-sm">Edit</a></div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->