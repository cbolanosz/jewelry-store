<?php

/* Author: Pablo José Benítez Trujillo */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name,'.$this->route('id'),
            'description' => 'required|string|max:1000',
        ];
    }
}
