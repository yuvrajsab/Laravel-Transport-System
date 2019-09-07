@extends('layouts.app')

@section('title', 'Customer List')

@push('stylesheets')
    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}">
@endpush

@section('content_header_title', 'Customer')

@section('content_header_buttons')
    <a href="{{ route('customer.create') }}" class="btn btn-sm btn-primary" role="button">
        <i class="fa fa-plus" style="margin-right: 5px;"></i>Add New</a>
@endsection

@section('content')

    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>State</th>
                <th>City</th>
                <th>Pin</th>
                <th>Mobile</th>
                <th>GSTIN</th>
                <th>PAN</th>
                <th>Created By</th>
                <th>Updated By</th>
                {{-- <th>Created At</th>
                <th>Updated At</th> --}}
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
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
                processing: true,
                serverSide: true,
                ajax: "{{ route('customer.getCustomers') }}",
                dom:"<'box box-success'" +
                    "<'box-header with-border'<'row'<'col-sm-6'l><'col-sm-6'f>>>" +
                    "<'box-body'<'row'<'col-sm-12'tr>>>" +
                    "<'box-footer'<'row'<'col-sm-5'i><'col-sm-7'p>>>" +
                    ">", 
                responsive: true,
                language: {
                    paginate: {
                    next: '&#187;', // or '→'
                    previous: '&#171;' // or '←' 
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'address_1', name: 'address_1'},
                    {data: 'state.name', name: 'state.name'},
                    {data: 'city.name', name: 'city.name'},
                    {data: 'pin', name: 'pin'},
                    {data: 'mobile_number', name: 'mobile_number'},
                    {data: 'gstin', name: 'gstin'},
                    {data: 'pan', name: 'pan'},
                    {data: 'created_by', name: 'created_by'},
                    {data: 'updated_by', name: 'updated_by'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},                    
                ]
            });
        })
    </script>
@endpush