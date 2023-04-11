@extends('front.layouts.default')

@section('title', 'Beasiswa - Vokasi UNS')

@section('sec-title', 'Beasiswa')

@push('css')
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@section('content')
    
    @include('front.layanan.header')
    
    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <table class="table table-bordered penelitian-datatable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>Link</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>

@endsection

@push('js')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(function() {
                var table = $('.penelitian-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('beasiswa.getData') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'link',
                            name: 'link'
                        },
                        {
                            data: 'deskripsi',
                            name: 'deskripsi'
                        },
                    ],
                    columnDefs: [
                        {
                            className: 'text-center',
                            width: '2%',
                            targets: [0]
                        },
                        {
                            className: 'text-center',
                            width: '2%',
                            targets: [1]
                        },
                    ]
                });
            });
        </script>
    @endpush