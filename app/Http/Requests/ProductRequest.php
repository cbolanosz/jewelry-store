<?php

/* Author: Pablo José Benítez Trujillo */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'material' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'weight' => 'required|numeric|min:0',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => ($this->route('id') ? 'nullable' : 'required').'|image|max:2048',
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => __('product.category_attribute'),
        ];
    }
}
