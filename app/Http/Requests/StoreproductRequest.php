<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreproductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "category_id"=>"required",
            "name"=>"required|min:2",
            "description"=>"required|min:2",
            "price"=>"required|numeric",
            "quantity"=>"required|numeric",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            "size"=>"required",
            "color"=>"required",

        ];
    }
}
