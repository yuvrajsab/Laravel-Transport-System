<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsignmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => ['required', 'string'],
            'risk' => ['required', 'string', 'max:255'],
            'gst_paid_by' => ['required', 'string', 'max:255'],
            'mod' => ['required', 'string', 'max:255'],
            'service_type' => ['required', 'string', 'max:255'],
            'vehicle_number' => ['required', 'string', 'max:255'],
            'vehicle_type' => ['required', 'string', 'max:255'],
            'pay_basis' => ['required', 'string', 'max:255'],
            'remarks' => ['nullable', 'string', 'max:255'],
            'customer' => ['required', 'exists:customers,id'],
            'consignor' => ['required', 'exists:consignors,id'],
            'consignee' => ['required', 'exists:consignees,id'],

            'freight_basic' => ['required', 'numeric'],
            'freight_handling' => ['required', 'numeric'],
            'freight_delivery' => ['required', 'numeric'],
            'freight_enroute' => ['required', 'numeric'],
            'freight_loading' => ['required', 'numeric'],
            'freight_unloading' => ['required', 'numeric'],
            'freight_misc' => ['required', 'numeric'],

            'invoice_number' => ['required', 'array'],
            "invoice_number.*" => ['required', 'string', 'max:255'],

            'invoice_date' => ['required', 'array'],
            "invoice_date.*" => ['required', 'string'],

            'invoice_hsn' => ['required', 'array'],
            "invoice_hsn.*" => ['nullable', 'string', 'max:255'],

            'ewaybill_number' => ['required', 'array'],
            "ewaybill_number.*" => ['nullable', 'string', 'max:255'],

            'ewaybill_date' => ['required', 'array'],
            "ewaybill_date.*" => ['nullable', 'string'],

            'invoice_ack_weight' => ['required', 'array'],
            "invoice_ack_weight.*" => ['nullable', 'numeric'],

            'invoice_chrg_weight' => ['required', 'array'],
            "invoice_chrg_weight.*" => ['nullable', 'numeric'],

            'invoice_desc' => ['required', 'array'],
            "invoice_desc.*" => ['nullable', 'string', 'max:255'],

            'invoice_nop' => ['required', 'array'],
            "invoice_nop.*" => ['nullable', 'numeric'],

            'invoice_pkt_type' => ['required', 'array'],
            "invoice_pkt_type.*" => ['nullable', 'string', 'max:255'],

            'invoice_value' => ['required', 'array'],
            "invoice_value.*" => ['required', 'numeric'],

            'insurance_company_name' => ['nullable', 'string', 'max:255'],
            'insurance_policy_number' => ['nullable', 'string', 'max:255'],
            'insurance_policy_start_date' => ['nullable', 'string'],
            'insurance_policy_end_date' => ['nullable', 'string'],
            'insurance_sum_insurred' => ['nullable', 'numeric'],
            'insurance_remarks' => ['nullable', 'string'],
        ];
    }
}
