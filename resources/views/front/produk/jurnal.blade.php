@extends('front.layouts.default')

@section('title', 'Jurnal - Vokasi UNS')

@section('sec-title', 'Jurnal')

@push('css')
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@section('content')

    @include('front.layanan.header')

    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <div class="md-5">
                <div class="section-title" data-aos="fade-up" data-aos-delay="150">
                    <h3>Jurnal</h3>
                    <h2>Nasional Terakreditasi (ISSN)</h2>
                </div>
                <table class="table table-bordered terakreditasi-datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Jurnal</th>
                            <th>Terakreditasi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                <div class="section-title" data-aos="fade-up" data-aos-delay="150">
                    <h3>Jurnal</h3>
                    <h2>Nasional Ber-ISSN</h2>
                </div>
                <table class="table table-bordered belumterakreditasi-datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Jurnal</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('.terakreditasi-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('jurnal.getTerakreditasi') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'terakreditasi',
                        name: 'terakreditasi'
                    },
                ],
                columnDefs: [{
                        className: 'text-center',
                        width: '2%',
                        targets: [0]
                    },
                ]
            });
            var table = $('.belumterakreditasi-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('jurnal.getBelumTerakreditasi') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                ],
                columnDefs: [{
                        className: 'text-center',
                        width: '2%',
                        targets: [0]
                    },
                ]
            });
        });
    </script>
@endpush
