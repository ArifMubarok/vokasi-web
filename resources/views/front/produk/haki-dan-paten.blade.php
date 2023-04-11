@extends('front.layouts.default')

@section('title', 'Haki dan Paten - Vokasi UNS')

@section('sec-title', 'Haki dan Paten')


@push('css')
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@section('content')

    @include('front.layanan.header')

    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <table class="table table-bordered hakidanpaten-datatable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Haki dan Paten</th>
                        <th>Program Studi</th>
                        <th>Grup Riset</th>
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

            var table = $('.hakidanpaten-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('haki-dan-paten.list') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'haki',
                        name: 'Haki atau Paten'
                    },
                    {
                        data: 'prodi.name',
                        name: 'Program Studi'
                    },
                    {
                        data: 'grup.nama',
                        name: 'Grup Riset'
                    },
                ],
            });
        });
    </script>
@endpush
