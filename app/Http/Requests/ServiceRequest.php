<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Allowing all users to make requests
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'idS' => 'required',
            'nomS' => 'required',
            'categorieS' => 'required',
            'critereS' => 'required',
            'idP' => 'required',
            // Uncomment the line below if imgS is required
            // 'imgS'=> 'required|image|mimes:jpg,png,jpeg,svg',
        ];
    }
}
