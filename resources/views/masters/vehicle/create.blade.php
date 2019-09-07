@extends('layouts.app')

@section('title', 'Vehicle Create')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@section('content_header_title', 'New Vehicle')

@section('content')
    <div class="box box-primary">
        <form id="form" action="{{ route('vehicle.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="box-header with-border">
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="owner">Owner *</label>
                            <select name="owner" id="owner" class="form-control select2-vehicle_owner" style="width: 100%" required data-parsley-type="number">
                                @foreach ($vehicle_owners as $vehicle_owner)
                                    @if ($vehicle_owner->id == old('owner'))
                                        <option value="{{ $vehicle_owner->id }}" selected>{{ $vehicle_owner->name }}</option>                                    
                                    @else
                                        <option value="{{ $vehicle_owner->id }}">{{ $vehicle_owner->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="registration_number">Registration Number *</label>
                            <input type="text" class="form-control" id="registration_number" name="registration_number" value="{{ old('registration_number') }}" placeholder="Enter registration number" required maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="registration_date">Registration Date *</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" id="registration_date" name="registration_date" value="{{ old('registration_date') }}" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" required>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="type">Type of Vehicle *</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}" placeholder="Enter vehicle type" required maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="body">Type of Body *</label>
                            <input type="text" class="form-control" id="body" name="body" value="{{ old('body') }}" placeholder="Enter vehicle body type" required maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="engine_number">Engine Number *</label>
                            <input type="text" class="form-control" id="engine_number" name="engine_number" value="{{ old('engine_number') }}" placeholder="Enter engine number" required maxlength="255">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="chassis_number">Chassis Number *</label>
                            <input type="text" class="form-control" id="chassis_number" name="chassis_number" value="{{ old('chassis_number') }}" placeholder="Enter chassis number" required maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="capacity">Loading Capacity *</label>
                            <input type="text" class="form-control" id="capacity" name="capacity" value="{{ old('capacity') }}" placeholder="Enter loading capacity" required maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="address_1">Address 1 *</label>
                            <input type="text" class="form-control" id="address_1" name="address_1" value="{{ old('address_1') }}" placeholder="Enter address" required maxlength="255">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="address_2">Address 2</label>
                            <input type="text" class="form-control" id="address_2" name="address_2" value="{{ old('address_2') }}" placeholder="Enter address" maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="address_3">Address 3</label>
                            <input type="text" class="form-control" id="address_3" name="address_3" value="{{ old('address_3') }}" placeholder="Enter address" maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="landmark">Landmark</label>
                            <input type="text" class="form-control" id="landmark" name="landmark" value="{{ old('landmark') }}" placeholder="Enter landmark" maxlength="255">
                        </div>
                    </div>
                </div>

                <div class="row">
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
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="pin">Pin *</label>
                            <input type="text" class="form-control" id="pin" name="pin" value="{{ old('pin') }}" placeholder="Enter pin" required data-parsley-type="alphanum" maxlength="9">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number *</label>
                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Enter mobile number" required maxlength="15" data-parsley-type="number">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="alternate_number">Alternate Number</label>
                            <input type="text" class="form-control" id="alternate_number" name="alternate_number" placeholder="Enter alternate number" value="{{ old('alternate_number') }}" maxlength="15" data-parsley-type="number">
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

            </div>
            <div class="box-footer">
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i>
                    Save
                </button>
                <a href="{{ route('vehicle.index') }}" class="btn btn-default" role="button">
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

            // Select2 initialization for vehicle_owner
            $('.select2-vehicle_owner').select2();

            //Datemask dd/mm/yyyy
            $('#registration_date').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

            // Select2 change previously selected item
            @empty(!old('country'))
                $('.select2_country').val({{ old('country') }}).trigger('change');
            @endempty
            @empty(!old('state'))
                setTimeout(()=>{
                    $('.select2_state').val({{ old('state') }}).trigger('change');
                },1000)
            @endempty
            @empty(!old('city'))
                $(document).ajaxStop(function() {
                    // place code to be executed on completion of last outstanding ajax call here
                    $('.select2_city').val({{ old('city') }}).trigger('change');
                });
            @endempty
        })
    </script>
@endpush