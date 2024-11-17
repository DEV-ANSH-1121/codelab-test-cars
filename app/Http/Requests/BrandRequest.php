<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'is_active' => ['boolean'],
        ];

        if ($this->isMethod('post')) {
            $rules['name'][] = 'unique:brands';
        } else {
            $rules['name'][] = 'unique:brands,name,' . $this->brand->id;
        }

        return $rules;
    }
}
