<?php

/* Author: Diego Mesa */

namespace App\Http\Requests;

use App\Models\Payment;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shipping_address' => 'required|string|max:255',
            'method' => 'required|in:'.implode(',', Payment::getMethods()),
        ];
    }
}
