<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;

class UserRequestUpdate extends UserRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $current_id = request()->route('id');
        return [
            'surname' => ['required', 'string', 'min:2', 'max:255'],
            'firstname' => ['required', 'string', 'min:2', 'max:255'],
            'phonenumber' => ['exclude_if:role_id,1', Rule::requiredIf(!User::find($current_id)->is_basic() ), 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$current_id ],
            'role_id' => ['required', 'exists:roles,id']
        ];
    }
}
