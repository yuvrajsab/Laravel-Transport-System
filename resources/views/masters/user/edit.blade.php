@extends('layouts.app')

@section('title', 'User Edit')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@section('content_header_title', 'Edit User')

@section('content')    
    <div class="box box-success">
        <form id="form" action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="box-header with-border">
                {{-- <h3 class="box-title">Default Box Example</h3> --}}
            </div>
            <div class="box-body">
                
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter name" required maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Enter email" required maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Enter password" required minlength="8" maxlength="30" pattern="^[a-zA-Z0-9!@#$%]+$">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password *</label>
                            <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter confirm password" required data-parsley-equalto="#password">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="address">Address *</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}" placeholder="Enter address" required maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="state">State *</label>
                            <select name="state" id="state" class="form-control select2_state" style="width: 100%" required data-parsley-type="number">
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="city">City *</label>
                            <select name="city" id="city" class="form-control select2_city" style="width: 100%" required data-parsley-type="number">
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="zip_code">Zip Code *</label>
                            <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ old('zip_code', $user->zip_code) }}" placeholder="Enter zip code" required data-parsley-type="alphanum" maxlength="9">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="files">Files</label>
                            <input type="file" name="files[]" id="files" multiple>
                        </div>
                    </div>
                </div>
                
                <div class="row col-xs-12">
                    @include('layouts.partials.form._mediaDisplay', ['model' => $user, 'reference' => 'user'])                    
                </div>

            </div>
            <div class="box-footer">
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i>
                    Save
                </button>
                <a href="{{ route('user.index') }}" class="btn btn-default" role="button">
                    <i class="fa fa-times-circle"></i>
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/state-city-select2.js') }}"></script>
    
    <script>
        $(function() {
            getCities();

            // Select2 change previously selected item
            $('.select2_state').val({{ old('state', $user->state_id) }}).trigger('change');
            $(document).ajaxStop(function() {
                // place code to be executed on completion of last outstanding ajax call here
                $('.select2_city').val({{ old('city', $user->city_id) }}).trigger('change');
            });
        })
    </script>
@endpush