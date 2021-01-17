<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
        return [
            'name' => 'required|unique:products,name,'.$this->product.'|max:128',          
            'slug' => 'nullable|unique:products,slug,'.$this->product.'|max:128',
            'price' => 'required|min:1|numeric',
            'description' => 'nullable',
            'recommended' => 'boolean',
            'category_id' => 'nullable|integer',
            'img' => 'nullable|mimes:jpeg,bmp,gif',
        ];
    }
    
}
