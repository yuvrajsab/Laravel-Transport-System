@extends('layouts.app')

@section('title', 'Driver Edit')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@section('content_header_title', 'Edit Driver')

@section('content')
    <div class="box box-primary">
        <form id="form" action="{{ route('driver.update', $driver->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="box-header with-border">
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $driver->name) }}" placeholder="Enter name" required maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="licence_number">Licence Number *</label>
                            <input type="text" class="form-control" id="licence_number" name="licence_number" value="{{ old('licence_number', $driver->licence_number) }}" placeholder="Enter licence number without spaces" required maxlength="13">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="licence_rto">Licence RTO *</label>
                            <input type="text" class="form-control" id="licence_rto" name="licence_rto" value="{{ old('licence_rto', $driver->licence_rto) }}" placeholder="Enter licence rto" required maxlength="255">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="licence_validity">Licence Validity *</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" id="licence_validity" name="licence_validity" value="{{ old('licence_validity', date('d-m-Y', strtotime($driver->licence_validity))) }}" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="address_1">Address 1 *</label>
                            <input type="text" class="form-control" id="address_1" name="address_1" value="{{ old('address_1', $driver->address_1) }}" placeholder="Enter address" required maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="address_2">Address 2</label>
                            <input type="text" class="form-control" id="address_2" name="address_2" value="{{ old('address_2', $driver->address_2) }}" placeholder="Enter address" maxlength="255">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="address_3">Address 3</label>
                            <input type="text" class="form-control" id="address_3" name="address_3" value="{{ old('address_3', $driver->address_3) }}" placeholder="Enter address" maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="landmark">Landmark</label>
                            <input type="text" class="form-control" id="landmark" name="landmark" value="{{ old('landmark', $driver->landmark) }}" placeholder="Enter landmark" maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="country">Country *</label>
                            <select name="country" id="country" class="form-control select2_country" style="width: 100%" required data-parsley-type="number">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="state">State *</label>
                            <select name="state" id="state" class="form-control select2_state" style="width: 100%" required data-parsley-type="number">
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="city">City *</label>
                            <select name="city" id="city" class="form-control select2_city" style="width: 100%" required data-parsley-type="number">
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="pin">Pin *</label>
                            <input type="text" class="form-control" id="pin" name="pin" value="{{ old('pin', $driver->pin) }}" placeholder="Enter pin" required data-parsley-type="alphanum" maxlength="9">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number *</label>
                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $driver->mobile_number) }}" placeholder="Enter mobile number" required maxlength="15" data-parsley-type="number">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="alternate_number">Alternate Number</label>
                            <input type="text" class="form-control" id="alternate_number" name="alternate_number" placeholder="Enter alternate number" value="{{ old('alternate_number', $driver->alternate_number) }}" maxlength="15" data-parsley-type="number">
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
                    @include('layouts.partials.form._mediaDisplay', ['model' => $driver, 'reference' => 'driver'])
                </div>

            </div>
            <div class="box-footer">
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i>
                    Save
                </button>
                <a href="{{ route('driver.index') }}" class="btn btn-default" role="button">
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
    {{-- Inputmask --}}
    <script src="{{ asset('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

    <script>
        $(function() {
            getStates();

            //Datemask dd/mm/yyyy
            $('#licence_validity').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

            // Select2 change previously selected item
            $('.select2_country').val({{ old('country', $driver->country_id) }}).trigger('change');
            setTimeout(()=>{
                $('.select2_state').val({{ old('state', $driver->state_id) }}).trigger('change');
            },1000)
            $(document).ajaxStop(function() {
                // place code to be executed on completion of last outstanding ajax call here
                $('.select2_city').val({{ old('city', $driver->city_id) }}).trigger('change');
            });
        })
    </script>
@endpush