<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if (request()->isMethod('POST')) {
            $data = [
                'name' => 'required',
                'thumbnail' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'about' => 'required',
            ];
        } elseif (request()->isMethod('PUT')) {
            $data = [
                'name' => 'required|string',
                'thumbnail' => 'sometimes|image|mimes:png,jpg,jpeg|max:2048',
                'about' => 'required|string'
            ];
        }

        return $data;
    }
}
