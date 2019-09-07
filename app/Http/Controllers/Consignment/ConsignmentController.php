<?php

namespace App\Http\Controllers\Consignment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Consignor;
use App\Models\Consignee;
use App\Http\Requests\ConsignmentRequest;
use App\Models\Consignment\Consignment;
use App\Models\Consignment\Freight;
use App\Models\Consignment\Invoice;
use App\Models\Consignment\Insurance;

class ConsignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consignments = Consignment::all();
        return view('consignment.booking.index')->withConsignments($consignments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $consignors = Consignor::all();
        $consignees = Consignee::all();
        return view('consignment.booking.create')->withCustomers($customers)->withConsignors($consignors)->withConsignees($consignees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsignmentRequest $request)
    {
        $consignment = Consignment::create([
            'date' => date('Y-m-d', strtotime(str_replace('-', '/', $request->date))),
            'risk' => $request->risk,
            'gst_paid_by' => $request->gst_paid_by,
            'mod' => $request->mod,
            'service_type' => $request->service_type,
            'vehicle_number' => $request->vehicle_number,
            'vehicle_type' => $request->vehicle_type,
            'pay_basis' => $request->pay_basis,
            'remarks' => $request->remarks,
            'customer_id' => $request->customer,
            'consignor_id' => $request->consignor,
            'consignee_id' => $request->consignee,
            'created_by' => $request->user()->name,
        ]);

        Freight::create([
            'consignment_id' => $consignment->id,
            'basic' => $request->freight_basic,
            'handling' => $request->freight_handling,
            'delivery' => $request->freight_delivery,
            'enroute' => $request->freight_enroute,
            'loading' => $request->freight_loading,
            'unloading' => $request->freight_unloading,
            'misc' => $request->freight_misc,
            'total' => $request->freight_basic + $request->freight_handling + $request->freight_delivery + 
                        $request->freight_enroute + $request->freight_loading + $request->freight_unloading + $request->freight_misc,
        ]);

        Insurance::create([
            'consignment_id' => $consignment->id,
            'company_name' => $request->insurance_company_name,
            'policy_number' => $request->insurance_policy_number,
            'policy_start_date' => date('Y-m-d', strtotime(str_replace('-', '/', $request->insurance_policy_start_date))),
            'policy_end_date' => date('Y-m-d', strtotime(str_replace('-', '/', $request->insurance_policy_end_date))),
            'sum_insurred' => $request->insurance_sum_insurred,
            'remarks' => $request->insurance_remarks,
        ]);

        foreach( $request->invoice_number as $k => $v ) {
            Invoice::create([
                'consignment_id' => $consignment->id,
                'number' => $request->invoice_number[$k],
                'date' => date('Y-m-d', strtotime(str_replace('-', '/', $request->invoice_date[$k]))),
                'hsn' => $request->invoice_hsn[$k],
                'ewaybill_number' => $request->ewaybill_number[$k],
                'ewaybill_date' => date('Y-m-d', strtotime(str_replace('-', '/', $request->ewaybill_date[$k]))),
                'ack_weight' => $request->invoice_ack_weight[$k],
                'chrg_weight' => $request->invoice_chrg_weight[$k],
                'desc' => $request->invoice_desc[$k],
                'nop' => $request->invoice_nop[$k],
                'pkt_type' => $request->invoice_pkt_type[$k],
                'value' => $request->invoice_value[$k],
            ]);
        }

        return redirect()->route('booking.index')->withSuccess('Consignment Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
