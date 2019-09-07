@extends('layouts.app')

@section('title', 'Consignor Edit')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@section('content_header_title', 'Edit Consignor')

@section('content')
    <div class="box box-primary">
        <form id="form" action="{{ route('consignor.update', $consignor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="box-header with-border">
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="customer">Customer *</label>
                            <select name="customer" id="customer" class="form-control select2_customer" style="width:100%" required data-parsley-type="number">
                                @foreach ($customers as $customer)
                                    @if ($customer->id == old('customer', $consignor->customer_id))
                                        <option value="{{ $customer->id }}" selected>{{ $customer->name }}</option>                                    
                                    @else
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $consignor->name) }}" placeholder="Enter name" required maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="address_1">Address 1 *</label>
                            <input type="text" class="form-control" id="address_1" name="address_1" value="{{ old('address_1', $consignor->address_1) }}" placeholder="Enter address" required maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="address_2">Address 2</label>
                            <input type="text" class="form-control" id="address_2" name="address_2" value="{{ old('address_2', $consignor->address_2) }}" placeholder="Enter address" maxlength="255">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="address_3">Address 3</label>
                            <input type="text" class="form-control" id="address_3" name="address_3" value="{{ old('address_3', $consignor->address_3) }}" placeholder="Enter address" maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="landmark">Landmark</label>
                            <input type="text" class="form-control" id="landmark" name="landmark" value="{{ old('landmark', $consignor->landmark) }}" placeholder="Enter landmark" maxlength="255">
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
                            <input type="text" class="form-control" id="pin" name="pin" value="{{ old('pin', $consignor->pin) }}" placeholder="Enter pin" required data-parsley-type="alphanum" maxlength="9">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $consignor->mobile_number) }}" placeholder="Enter mobile number" maxlength="15" data-parsley-type="number">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="{{ old('phone', $consignor->phone) }}" maxlength="15" data-parsley-type="number">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $consignor->email) }}" placeholder="Enter email" maxlength="255">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $consignor->website) }}" placeholder="Enter website" maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="gstin">GSTIN</label>
                            <input type="text" class="form-control" id="gstin" name="gstin" value="{{ old('gstin', $consignor->gstin) }}" placeholder="Enter gstin" maxlength="15">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="pan">Pan</label>
                            <input type="text" class="form-control" id="pan" name="pan" value="{{ old('pan', $consignor->pan) }}" placeholder="Enter pan number" maxlength="10">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="files">Files</label>
                            <input type="file" name="files[]" id="files" multiple value="{{ old('files') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        @include('layouts.partials.form._mediaDisplay', ['model' => $consignor, 'reference' => 'consignor'])                        
                    </div>
                </div>

            </div>
            <div class="box-footer">
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i>
                    Save
                </button>
                <a href="{{ route('consignor.index') }}" class="btn btn-default" role="button">
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
            getStates();

            // Select2 change previously selected item
            $('.select2_country').val({{ old('country', $consignor->country_id) }}).trigger('change');
            setTimeout(()=>{
                $('.select2_state').val({{ old('state', $consignor->state_id) }}).trigger('change');
            },1000)
            $(document).ajaxStop(function() {
                // place code to be executed on completion of last outstanding ajax call here
                $('.select2_city').val({{ old('city', $consignor->city_id) }}).trigger('change');
            });
        })
    </script>
@endpush