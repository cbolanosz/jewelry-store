<?php

/* Author: Pablo José Benítez Trujillo */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductSearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => 'nullable|string|max:100',
            'category_id' => 'nullable|integer|exists:categories,id',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => __('product.category_attribute'),
            'min_price' => __('product.min_price_attribute'),
            'max_price' => __('product.max_price_attribute'),
        ];
    }
}
