@extends('layouts.app')

@section('title', 'Consignment List')

@push('stylesheets')
    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}">
@endpush

@section('content_header_title', 'Consignments')

@section('content_header_buttons')
    <a href="{{ route('booking.create') }}" class="btn btn-sm btn-primary" role="button">
        <i class="fa fa-plus" style="margin-right: 5px;"></i>Add New</a>
@endsection

@section('content')

    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Risk</th>
                <th>GST Paid By</th>
                <th>MOD</th>
                <th>Service Type</th>
                <th>Vehicle Number</th>
                <th>Vehicle Type</th>
                <th>Pay Basis</th>
                <th>Freight</th>
                {{-- <th>Invoice Number</th> --}}
                <th>Insurance</th>
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consignments as $consignment)
                <tr>
                    <td>{{ $consignment->id }}</td>
                    <td>{{ date('d-m-Y', strtotime($consignment->date)) }}</td>
                    <td>{{ $consignment->risk }}</td>
                    <td>{{ $consignment->gst_paid_by }}</td>
                    <td>{{ $consignment->mod }}</td>
                    <td>{{ $consignment->service_type }}</td>
                    <td>{{ $consignment->vehicle_number }}</td>
                    <td>{{ $consignment->vehicle_type }}</td>
                    <td>{{ $consignment->pay_basis }}</td>
                    <td>{{ $consignment->freight->total }}</td>
                    {{-- <td>{{ $consignment->invoice->number }}</td> --}}
                    <td>{{ $consignment->insurance->company_name }}</td>
                    {{-- <td>{{ $consignment->created_by }}</td>
                    @if (isset($consignment->updated_by))
                        <td>{{ $consignment->updated_by }}</td>
                    @else
                        <td></td>
                    @endif --}}
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-ellipsis-h"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ route('booking.show', $consignment->id) }}">Show</a></li>
                                <li><a href="{{ route('booking.edit', $consignment->id) }}">Edit</a></li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('booking.destroy', $consignment->id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@push('scripts')
    {{-- Datatables --}}
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive-bs/js/responsive.bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/laravel.js') }}"></script>
    <script>
        $(function() {
            $('#table').DataTable({
                dom:"<'box box-success'" +
                    "<'box-header with-border'<'row'<'col-sm-6'l><'col-sm-6'f>>>" +
                    "<'box-body'<'row'<'col-sm-12'tr>>>" +
                    "<'box-footer'<'row'<'col-sm-5'i><'col-sm-7'p>>>" +
                    ">", 
                responsive: true,
                columnDefs: [{ 
                    "searching": false, 
                    "orderable": false, 
                    // "targets": [11] 
                }],
                language: {
                    paginate: {
                    next: '&#187;', // or '→'
                    previous: '&#171;' // or '←' 
                    }
                },
            });
        })
    </script>
@endpush