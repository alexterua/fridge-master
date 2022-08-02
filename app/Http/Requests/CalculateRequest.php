<?php

namespace App\Http\Requests;

use App\Models\Block;
use App\Models\Booking;
use Illuminate\Foundation\Http\FormRequest;

class CalculateRequest extends FormRequest
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
            'product_volume' => 'required|numeric',
            'storage_temperature' => 'required|numeric|min:-24|max:-1',
            'expiration_date' => 'required|numeric|min:1|max:24',
        ];
    }
}
