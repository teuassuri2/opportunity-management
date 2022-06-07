<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOpportunitysRequest extends FormRequest {

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
            'title' => ['required'],
            'description' => ['required'],
            'users_id' => ['required'],
            'customers_id' => ['required'],
            'products_id' => ['required'],];
    }

    public function messages() {
        return [
            'title.required' => 'O campo é Title obrigatório',
            'description.required' => 'O campo é Description obrigatório',
            'users_id.required' => 'O campo é Users_id obrigatório',
            'customers_id.required' => 'O campo é Customers_id obrigatório',
            'products_id.required' => 'O campo é Products_id obrigatório',];
    }

}
