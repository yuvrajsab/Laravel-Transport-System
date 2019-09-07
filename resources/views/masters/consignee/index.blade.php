@extends('layouts.app')

@section('title', 'Consignee List')

@push('stylesheets')
    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}">
@endpush

@section('content_header_title', 'Consignee')

@section('content_header_buttons')
    <a href="{{ route('consignee.create') }}" class="btn btn-sm btn-primary" role="button">
        <i class="fa fa-plus" style="margin-right: 5px;"></i>Add New</a>
@endsection

@section('content')

    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
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
                <th>Created At</th>
                <th>Updated At</th>
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consignees as $consignee)
                <tr>
                    <td>{{ $consignee->id }}</td>
                    <td>{{ $consignee->customer->name }}</td>
                    <td>{{ $consignee->name }}</td>
                    <td>{{ $consignee->email }}</td>
                    <td>{{ $consignee->address_1 }}</td>
                    <td>{{ $consignee->state->name }}</td>
                    <td>{{ $consignee->city->name }}</td>
                    <td>{{ $consignee->pin }}</td>
                    <td>{{ $consignee->mobile_number }}</td>
                    <td>{{ $consignee->gstin }}</td>
                    <td>{{ $consignee->pan }}</td>
                    @if (isset($consignee->created_by))
                        <td>{{ $consignee->created_by }}</td>
                    @else
                        <td></td>
                    @endif
                    @if (isset($consignee->updated_by))
                        <td>{{ $consignee->updated_by }}</td>
                    @else
                        <td></td>
                    @endif
                    <td>{{ $consignee->created_at }}</td>
                    <td>{{ $consignee->updated_at }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-ellipsis-h"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ route('consignee.show', $consignee->id) }}">Show</a></li>
                                <li><a href="{{ route('consignee.edit', $consignee->id) }}">Edit</a></li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('consignee.destroy', $consignee->id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">Delete</a>
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
                    "targets": [15] 
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