@extends('layouts.app')

@section('title', 'Consignment Create')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
    {{-- iCheck --}}
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/iCheck/all.css') }}">
@endpush

@section('content_header_title', 'New Consignment')

@section('content')
    <form id="" action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Basic --}}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Basic Details</h3>
                <div class="box-tools">
                    <!-- This will cause the box to collapse when clicked -->
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="date">Date *</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" id="date" name="date" value="{{ old('date') }}" class="form-control date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" >
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="risk">Risk *</label>
                            <select name="risk" id="risk" class="form-control select2" style="width: 100%" required>
                                @php
                                    $risk = ['OWNER', 'CONSIGNOR', 'CONSIGNEE', 'TRANSPORTER'];
                                @endphp
                                
                                @foreach ($risk as $item)
                                    @if ($item == old('risk'))                                        
                                        <option value="{{$item}}" selected>{{$item}}</option>
                                    @else
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="gst_paid_by">GST Paid By *</label>
                            <select class="form-control select2" name="gst_paid_by" id="gst_paid_by" style="width: 100%" required>
                                @php
                                    $gst_paid_by = ['CONSIGNOR', 'CONSIGNEE', 'TRANSPOTER'];
                                @endphp

                                @foreach ($gst_paid_by as $item)
                                    @if ($item == old('gst_paid_by'))
                                        <option value="{{$item}}" selected>{{$item}}</option>                                        
                                    @else
                                        <option value="{{$item}}">{{$item}}</option>                                    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="mod">MOD *</label>
                            <select class="form-control select2" name="mod" id="mod" style="width: 100%" required>
                                @php
                                    $mod = ['ROAD', 'AIR', 'RAIL'];
                                @endphp

                                @foreach ($mod as $item)
                                    @if ($item == old('mod'))
                                        <option value="{{$item}}" selected>{{$item}}</option>                                        
                                    @else
                                        <option value="{{$item}}">{{$item}}</option>                                    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="service_type">Service Type *</label>
                            <select class="form-control select2" name="service_type" id="service_type" style="width: 100%" required>
                                @php
                                    $service_type = ['FTL', 'PARTLOAD', 'PACKAGE'];
                                @endphp

                                @foreach ($service_type as $item)
                                    @if ($item == old('service_type'))
                                        <option value="{{$item}}" selected>{{$item}}</option>                                        
                                    @else
                                        <option value="{{$item}}">{{$item}}</option>                                    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="vehicle_number">Vehicle Number *</label>
                            <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" value="{{ old('vehicle_number') }}" placeholder="Enter vehicle number" required maxlength="255">                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="vehicle_type">Vehicle Type *</label>
                            <select class="form-control select2" name="vehicle_type" id="vehicle_type" style="width: 100%" required>
                                @php
                                    $vehicle_type = [ '17_Feet', '20_Feet', '22_Feet', '24_Feet', '32_Feet_SXL', '32_Feet_MXL', 'OPEN_TRUCK' ];
                                @endphp

                                @foreach ($vehicle_type as $item)
                                    @if ($item == old('vehicle_type'))
                                        <option value="{{$item}}" selected>{{ str_replace('_', ' ', $item) }}</option>                                        
                                    @else
                                        <option value="{{$item}}">{{ str_replace('_', ' ', $item) }}</option>                                    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="pay_basis">Pay Basis *</label>
                            <select class="form-control select2" name="pay_basis" id="pay_basis" style="width: 100%" required>
                                @php
                                    $pay_basis = ['TO_BE_BILLED', 'PAID', 'TOPAY'];
                                @endphp

                                @foreach ($pay_basis as $item)
                                    @if ($item == old('pay_basis'))
                                        <option value="{{$item}}" selected>{{ str_replace('_', ' ', $item) }}</option>                                        
                                    @else
                                        <option value="{{$item}}">{{ str_replace('_', ' ', $item) }}</option>                                    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <input type="text" class="form-control" id="remarks" name="remarks" value="{{ old('remarks') }}" placeholder="Enter remarks" maxlength="255">                            
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
        </div>

        {{-- Customer --}}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Customer</h3>
                <div class="box-tools">
                    <!-- This will cause the box to collapse when clicked -->
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="customer">Customer *</label>
                            <select class="form-control select2" name="customer" id="customer" style="width: 100%" required data-parsley-type="number">
                                @foreach ($customers as $customer)
                                    @if ($customer->id == old('customer'))
                                        <option value="{{ $customer->id }}" selected>{{ $customer->name }}</option>                                    
                                    @else
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Consignor --}}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Consignor</h3>
                <div class="box-tools">
                    <!-- This will cause the box to collapse when clicked -->
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="consignor">Consignor *</label>
                            <select class="form-control select2" name="consignor" id="consignor" style="width: 100%" required data-parsley-type="number">
                                @foreach ($consignors as $consignor)
                                    @if ($consignor->id == old('consignor'))
                                        <option value="{{ $consignor->id }}" selected>{{ $consignor->name }}</option>
                                    @else
                                        <option value="{{ $consignor->id }}">{{ $consignor->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Consignee --}}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Consignee</h3>
                <div class="box-tools">
                    <!-- This will cause the box to collapse when clicked -->
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="consignee">Consignee *</label>
                            <select class="form-control select2" name="consignee" id="consignee" style="width: 100%" required data-parsley-type="number">
                                @foreach ($consignees as $consignee)
                                    @if ($consignee->id == old('consignee'))
                                        <option value="{{ $consignee->id }}" selected>{{ $consignee->name }}</option>                                    
                                    @else
                                        <option value="{{ $consignee->id }}">{{ $consignee->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Freight --}}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Freight</h3>
                <div class="box-tools">
                    <!-- This will cause the box to collapse when clicked -->
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <div class="form-group">
                            <label for="freight_basic">Basic Freight *</label>
                            <input type="number" class="form-control" id="freight_basic" name="freight_basic" value="{{ old('freight_basic') }}" required min="0">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="form-group">
                            <label for="freight_handling">Handling Charges *</label>
                            <input type="number" class="form-control" id="freight_handling" name="freight_handling" value="{{ old('freight_handling') }}" required min="0">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="form-group">
                            <label for="freight_delivery">Delivery Charges *</label>
                            <input type="number" class="form-control" id="freight_delivery" name="freight_delivery" value="{{ old('freight_delivery') }}" required min="0">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="form-group">
                            <label for="freight_enroute">Enroute Charges *</label>
                            <input type="number" class="form-control" id="freight_enroute" name="freight_enroute" value="{{ old('freight_enroute') }}" required min="0">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <div class="form-group">
                            <label for="freight_loading">Loading Charges *</label>
                            <input type="number" class="form-control" id="freight_loading" name="freight_loading" value="{{ old('freight_loading') }}" required min="0">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="form-group">
                            <label for="freight_unloading">Unloading Charges *</label>
                            <input type="number" class="form-control" id="freight_unloading" name="freight_unloading" value="{{ old('freight_unloading') }}" required min="0">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="form-group">
                            <label for="freight_misc">Misc Charges *</label>
                            <input type="number" class="form-control" id="freight_misc" name="freight_misc" value="{{ old('freight_misc') }}" required min="0">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="form-group">
                            <label for="freight_total">Total Freight *</label>
                            <input type="number" class="form-control" id="freight_total" disabled>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Invoice --}}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Invoice
                    <button onclick="selectAllRow()" type="button" class="btn btn-default btn-xs"><i class="fa fa-check"></i> &nbsp; Select All</button>
                </h3>
                <div class="box-tools">

                    <button onclick="addRow()" type="button" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> &nbsp; Add Row</button>
                    <button onclick="removeRow()" type="button" class="btn btn-danger btn-xs"><i class="fa fa-minus"></i> &nbsp; Remove Row</button>

                    <!-- This will cause the box to collapse when clicked -->
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table id="invoice_table" class="table table-bordered" style="overflow-x:auto;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" class="minimal invoice-checkbox" name="invoice-checkbox">
                                                </label>
                                            </div>
                                        </td>
                                        <td class="invoice-column">
                                            <div class="form-group">
                                                <label for="invoice_number">Invoice Number *</label>
                                                <input id="invoice_number" class="form-control" type="text" placeholder="Enter invoice number" name="invoice_number[]" required>
                                            </div>
                                        </td>
                                        <td class="invoice-column">
                                            <div class="form-group">
                                                <label for="invoice_date">Invoice Date *</label>
                                                <input type="text" id="invoice_date" name="invoice_date[]" class="form-control date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" required>
                                            </div>
                                        </td>
                                        <td class="invoice-column">
                                            <div class="form-group">                                        
                                                <label for="invoice_hsn">HSN Code</label>
                                                <input id="invoice_hsn" class="form-control" type="text" placeholder="Enter HSN Code" name="invoice_hsn[]">
                                            </div>
                                        </td>
                                        <td class="invoice-column">
                                            <div class="form-group">
                                                <label for="ewaybill_number">Eway Bill Number</label>
                                                <input id="ewaybill_number" class="form-control" type="text" placeholder="Enter Eway Bill Number" name="ewaybill_number[]" onchange="ewaybill()">
                                            </div>
                                        </td>
                                        <td class="invoice-column">
                                            <div class="form-group">
                                                <label for="ewaybill_date">Eway Bill Date</label>
                                                <input type="text" id="ewaybill_date" name="ewaybill_date[]" class="form-control date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                                            </div>
                                        </td>
                                        <td class="invoice-column">
                                            <div class="form-group">
                                                <label for="invoice_ack_weight">Actual Weight</label>
                                                <input id="invoice_ack_weight" class="form-control" type="text" placeholder="Enter Actual Weight" name="invoice_ack_weight[]">
                                            </div>
                                        </td>
                                        <td class="invoice-column">
                                            <div class="form-group">
                                                <label for="invoice_chrg_weight">Charged Weight</label>
                                                <input id="invoice_chrg_weight" class="form-control" type="text" placeholder="Enter Charged Weight" name="invoice_chrg_weight[]">
                                            </div>
                                        </td>
                                        <td class="invoice-column">
                                            <div class="form-group">
                                                <label for="invoice_desc">Description</label>
                                                <input id="invoice_desc" class="form-control" type="text" placeholder="Enter Description" name="invoice_desc[]">
                                            </div>
                                        </td>
                                        <td class="invoice-column">
                                            <div class="form-group">
                                                <label for="invoice_nop">Number of Packages</label>
                                                <input id="invoice_nop" class="form-control" type="text" placeholder="Enter Number of Packages" name="invoice_nop[]">
                                            </div>
                                        </td>
                                        <td class="invoice-column">
                                            <div class="form-group">
                                                <label for="invoice_pkt_type">Package Type</label>
                                                <input id="invoice_pkt_type" class="form-control" type="text" placeholder="Enter Package Type" name="invoice_pkt_type[]">
                                            </div>
                                        </td>
                                        <td class="invoice-column">
                                            <div class="form-group">
                                                <label for="invoice_value">Value *</label>
                                                <input id="invoice_value" class="form-control" type="text" placeholder="Enter Value" name="invoice_value[]" required>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Insurance --}}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Insurance</h3>
                <div class="box-tools">
                    <!-- This will cause the box to collapse when clicked -->
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="insurance_company_name">Company Name</label>
                            <input type="text" class="form-control" id="insurance_company_name" name="insurance_company_name" value="{{ old('insurance_company_name') }}" placeholder="Enter company name" maxlength="255">                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="insurance_policy_number">Policy Number</label>
                            <input type="text" class="form-control" id="insurance_policy_number" name="insurance_policy_number" value="{{ old('insurance_policy_number') }}" placeholder="Enter policy number" maxlength="255">                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="insurance_policy_start_date">Policy Start Date</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" id="insurance_policy_start_date" name="insurance_policy_start_date" value="{{ old('insurance_policy_start_date') }}" class="form-control date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                            </div>    
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="insurance_policy_end_date">Policy End Date</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" id="insurance_policy_end_date" name="insurance_policy_end_date" value="{{ old('insurance_policy_end_date') }}" class="form-control date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="insurance_sum_insurred">Sum Insurred</label>
                            <input type="number" class="form-control" id="insurance_sum_insurred" name="insurance_sum_insurred" value="{{ old('insurance_sum_insurred') }}" min="0">                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="insurance_remarks">Remarks</label>
                            <input type="text" class="form-control" id="insurance_remarks" name="insurance_remarks" value="{{ old('insurance_remarks') }}" placeholder="Enter policy number" maxlength="255">                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
            
        <div class="box box-primary">
            <div class="box-body">
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i>
                    Save
                </button>
                <a href="{{ route('booking.index') }}" class="btn btn-default" role="button">
                    <i class="fa fa-times-circle"></i>
                    Cancel
                </a>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/state-city-select2.js') }}"></script>
    {{-- Inputmask --}}
    <script src="{{ asset('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    {{-- iCheck --}}
    <script src="{{ asset('bower_components/admin-lte/plugins/iCheck/icheck.min.js') }}"></script>

    <script>
        function addRow() {
            $('#invoice_table > tbody').append(`
                <tr>
                    <td>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal invoice-checkbox" name="invoice-checkbox">
                            </label>
                        </div>
                    </td>
                    <td class="invoice-column">
                        <div class="form-group">
                            <label for="invoice_number">Invoice Number *</label>
                            <input id="invoice_number" class="form-control" type="text" placeholder="Enter invoice number" name="invoice_number[]" required>
                        </div>
                    </td>
                    <td class="invoice-column">
                        <div class="form-group">
                            <label for="invoice_date">Invoice Date *</label>
                            <input type="text" id="invoice_date" name="invoice_date[]" class="form-control date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" required>
                        </div>
                    </td>
                    <td class="invoice-column">
                        <div class="form-group">                                        
                            <label for="invoice_hsn">HSN Code</label>
                            <input id="invoice_hsn" class="form-control" type="text" placeholder="Enter HSN Code" name="invoice_hsn[]">
                        </div>
                    </td>
                    <td class="invoice-column">
                        <div class="form-group">
                            <label for="ewaybill_number">Eway Bill Number</label>
                            <input id="ewaybill_number" class="form-control" type="text" placeholder="Enter Eway Bill Number" name="ewaybill_number[]" onchange="ewaybill()">
                        </div>
                    </td>
                    <td class="invoice-column">
                        <div class="form-group">
                            <label for="ewaybill_date">Eway Bill Date</label>
                            <input type="text" id="ewaybill_date" name="ewaybill_date[]" class="form-control date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                        </div>
                    </td>
                    <td class="invoice-column">
                        <div class="form-group">
                            <label for="invoice_ack_weight">Actual Weight</label>
                            <input id="invoice_ack_weight" class="form-control" type="text" placeholder="Enter Actual Weight" name="invoice_ack_weight[]">
                        </div>
                    </td>
                    <td class="invoice-column">
                        <div class="form-group">
                            <label for="invoice_chrg_weight">Charged Weight</label>
                            <input id="invoice_chrg_weight" class="form-control" type="text" placeholder="Enter Charged Weight" name="invoice_chrg_weight[]">
                        </div>
                    </td>
                    <td class="invoice-column">
                        <div class="form-group">
                            <label for="invoice_desc">Description</label>
                            <input id="invoice_desc" class="form-control" type="text" placeholder="Enter Description" name="invoice_desc[]">
                        </div>
                    </td>
                    <td class="invoice-column">
                        <div class="form-group">
                            <label for="invoice_nop">Number of Packages</label>
                            <input id="invoice_nop" class="form-control" type="text" placeholder="Enter Number of Packages" name="invoice_nop[]">
                        </div>
                    </td>
                    <td class="invoice-column">
                        <div class="form-group">
                            <label for="invoice_pkt_type">Package Type</label>
                            <input id="invoice_pkt_type" class="form-control" type="text" placeholder="Enter Package Type" name="invoice_pkt_type[]">
                        </div>
                    </td>
                    <td class="invoice-column">
                        <div class="form-group">
                            <label for="invoice_value">Value *</label>
                            <input id="invoice_value" class="form-control" type="text" placeholder="Enter Value" name="invoice_value[]" required>
                        </div>
                    </td>
                </tr> 
            `);

            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            })

            //Datemask dd/mm/yyyy
            $('.date').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        }

        function selectAllRow() {
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck('check')
        }

        function removeRow() {
            if( $('input[type="checkbox"].minimal:checked').length == 0 ) {
                $.alert({
                    title: 'Whoops!',
                    content: 'No Row Selected!',
                    theme: 'bootstrap',
                    draggable: false,
                });
            }

            $('input[type="checkbox"].minimal:checked').each(function(){
               $(this).closest('tr').remove();
            });

            let trs = document.querySelector('#invoice_table').rows.length;
            if (trs == 0) {
                addRow();
            }
        }

        $(function() {
            getStates();

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            })

            // Select2 initializations
            $('.select2').select2();

            //Datemask dd/mm/yyyy
            $('.date').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

        })
    </script>
@endpush