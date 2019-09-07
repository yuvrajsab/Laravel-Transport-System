<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            $id = $this->route('user');
        } else {
            $id = null;
        }

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', "unique:users,email,{$id}", 'max:255'],
            'password' => ['required', 'confirmed', 'regex:^[a-zA-Z0-9!@#$%]+$^', 'min:8', 'max:30'],
            'address' => ['required', 'string'],
            'state' => ['required', 'exists:states,id'],
            'city' => ['required', 'exists:cities,id'],
            'zip_code' => ['required', 'alpha_num', 'max:9'],
        ];
    }
}
