<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOpportunitysStatusRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
'status' => ['required'], 
'users_id' => ['required'], 
'opportunitys_id' => ['required'], ];

    }

    public function messages()
    {
        return [
'status.required' => 'O campo é Status obrigatório', 
'users_id.required' => 'O campo é Users_id obrigatório', 
'opportunitys_id.required' => 'O campo é Opportunitys_id obrigatório', ];

    }
}
