<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUsersRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'remember_token' => ['required'],
            'password' => ['required'],
            'email_verified_at' => ['required'],
            'types_users_id' => ['required'],];
    }

    public function messages() {
        return [
            'name.required' => 'O campo é Name obrigatório',
            'phone.required' => 'O campo é Phone obrigatório',
            'email.required' => 'O campo é Email obrigatório',
            'remember_token.required' => 'O campo é Remember_token obrigatório',
            'password.required' => 'O campo é Password obrigatório',
            'email_verified_at.required' => 'O campo é Email_verified_at obrigatório',
            'types_users_id.required' => 'O campo é Types_users_id obrigatório',];
    }

}
