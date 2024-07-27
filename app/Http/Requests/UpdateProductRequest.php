<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateProductRequest extends FormRequest
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
            'name_ar' => 'required|between:3,255|string',
            'name_en' => 'required|between:3,255|string',
            'price' => 'required|numeric|between:0.5,99999999,99',
            'quantity' => 'nullable|integer|between:1,9999',
            'code' => 'required|digits:5',Rule::unique('products')->ignore(request()->route('id')), //product id
            'status' => 'nullable|integer', Rule::in([0, 1]),
            'des_ar' => 'required|string',
            'des_en' => 'required|string',
            'sub_category_id' => 'required|integer|exists:sub_categories,id',
            'brand_id' => 'nullable|integer|exists:brands,id',
            'image' => 'nullable |mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
