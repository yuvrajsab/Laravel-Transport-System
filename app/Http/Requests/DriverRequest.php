<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
            $id = $this->route('driver');
        } else {
            $id = null;
        }

        return [
            'name' => ['required', 'string', 'max:255'],
            'licence_number' => ['required', 'string', 'max:13', "unique:drivers,id,{$id}"],
            'licence_rto' => ['required', 'string', 'max:255'],
            'licence_validity' => ['required', 'date'],
            'address_1' => ['required', 'string', 'max:255'],
            'address_2' => ['nullable', 'string', 'max:255'],
            'address_3' => ['nullable', 'string', 'max:255'],
            'landmark' => ['nullable', 'string', 'max:255'],
            'country' => ['required', 'exists:countries,id'],
            'state' => ['required', 'exists:states,id'],
            'city' => ['required', 'exists:cities,id'],
            'pin' => ['required', 'alpha_num', 'max:9'],
            'mobile_number' => ['nullable', 'alpha_num', 'max:15'],
            'alternate_number' => ['nullable', 'alpha_num', 'max:15'],
        ];
    }
}
