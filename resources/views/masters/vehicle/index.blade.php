@extends('layouts.app')

@section('title', 'Vehicle List')

@push('stylesheets')
    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}">
@endpush

@section('content_header_title', 'Vehicles')

@section('content_header_buttons')
    <a href="{{ route('vehicle.create') }}" class="btn btn-sm btn-primary" role="button">
        <i class="fa fa-plus" style="margin-right: 5px;"></i>Add New</a>
@endsection

@section('content')

    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Owner</th>
                <th>Registration Number</th>
                <th>Registration Date</th>
                <th>Type</th>
                <th>Body</th>
                <th>Engine Number</th>
                <th>Chassis Number</th>
                <th>Capacity</th>
                <th>Address</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <th>Pin</th>
                <th>Mobile</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->owner->name }}</td>
                    <td>{{ $vehicle->registration_number }}</td>
                    <td>{{ $vehicle->registration_date }}</td>
                    <td>{{ $vehicle->type }}</td>
                    <td>{{ $vehicle->body }}</td>
                    <td>{{ $vehicle->engine_number }}</td>
                    <td>{{ $vehicle->chassis_number }}</td>
                    <td>{{ $vehicle->capacity }}</td>
                    <td>{{ $vehicle->address_1 }}</td>
                    <td>{{ $vehicle->country->name }}</td>
                    <td>{{ $vehicle->state->name }}</td>
                    <td>{{ $vehicle->city->name }}</td>
                    <td>{{ $vehicle->pin }}</td>
                    <td>{{ $vehicle->mobile_number }}</td>
                    <td>{{ $vehicle->created_by }}</td>
                    @if (isset($vehicle->updated_by))
                        <td>{{ $vehicle->updated_by }}</td>
                    @else
                        <td></td>
                    @endif
                    <td>{{ $vehicle->created_at }}</td>
                    <td>{{ $vehicle->updated_at }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-ellipsis-h"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ route('vehicle.show', $vehicle->id) }}">Show</a></li>
                                <li><a href="{{ route('vehicle.edit', $vehicle->id) }}">Edit</a></li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('vehicle.destroy', $vehicle->id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">Delete</a>
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