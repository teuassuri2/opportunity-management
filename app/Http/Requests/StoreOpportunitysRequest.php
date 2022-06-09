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
            'customers_id' => ['required'],
            'products_id' => ['required'],];
    }

    public function messages() {
        return [
            'title.required' => 'O campo Titulo da oportunidade é obrigatório',
            'description.required' => 'O campo Descrição é obrigatório',
            'customers_id.required' => 'Selecione um cliente',
            'products_id.required' => 'Selecione um produto',];
    }

}
