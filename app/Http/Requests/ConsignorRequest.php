<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsignorRequest extends FormRequest
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
        // Check if store or update
        if ($this->getMethod() == 'PATCH') {
            $id = $this->route('consignor');
        } else {
            $id = null;
        }

        return [
            'customer' => ['required', 'exists:customers,id'],
            'name' => ['required', 'string', 'max:255'],
            'address_1' => ['required', 'string', 'max:255'],
            'address_2' => ['nullable', 'string', 'max:255'],
            'address_3' => ['nullable', 'string', 'max:255'],
            'landmark' => ['nullable', 'string', 'max:255'],
            'country' => ['required', 'exists:countries,id'],
            'state' => ['required', 'exists:states,id'],
            'city' => ['required', 'exists:cities,id'],
            'pin' => ['required', 'alpha_num', 'max:9'],
            'mobile_number' => ['nullable', 'alpha_num', 'max:15'],
            'phone' => ['nullable', 'alpha_num', 'max:15'],
            'email' => ['nullable', 'email', 'max:255', "unique:consignor,email,{$id}"],
            'website' => [
                'nullable', 'max:255', 'regex:^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$^'
            ],
            'gstin' => ['nullable', 'alpha_num', 'max:15'],
            'pan' => ['nullable', 'alpha_num', 'max:10']
        ];
    }
}
