@extends('layouts.app')

@section('title', 'Broker List')

@push('stylesheets')
    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}">
@endpush

@section('content_header_title', 'Brokers')

@section('content_header_buttons')
    <a href="{{ route('broker.create') }}" class="btn btn-sm btn-primary" role="button">
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
                <th>Created At</th>
                <th>Updated At</th>
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brokers as $broker)
                <tr>
                    <td>{{ $broker->id }}</td>
                    <td>{{ $broker->name }}</td>
                    <td>{{ $broker->email }}</td>
                    <td>{{ $broker->address_1 }}</td>
                    <td>{{ $broker->state->name }}</td>
                    <td>{{ $broker->city->name }}</td>
                    <td>{{ $broker->pin }}</td>
                    <td>{{ $broker->mobile_number }}</td>
                    <td>{{ $broker->gstin }}</td>
                    <td>{{ $broker->pan }}</td>
                    @if (isset($broker->created_by))
                        <td>{{ $broker->created_by }}</td>
                    @else
                        <td></td>
                    @endif
                    @if (isset($broker->updated_by))
                        <td>{{ $broker->updated_by }}</td>
                    @else
                        <td></td>
                    @endif
                    <td>{{ $broker->created_at }}</td>
                    <td>{{ $broker->updated_at }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-ellipsis-h"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ route('broker.show', $broker->id) }}">Show</a></li>
                                <li><a href="{{ route('broker.edit', $broker->id) }}">Edit</a></li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('broker.destroy', $broker->id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">Delete</a>
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
                    "targets": [14] 
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