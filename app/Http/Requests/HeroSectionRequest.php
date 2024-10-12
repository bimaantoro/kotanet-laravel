<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroSectionRequest extends FormRequest
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
                'heading' => 'required|string|max:255',
                'subheading' => 'required|string|max:255',
                'banner' => 'required|image|mimes:png,jpg,jpeg|max:5120',
                'achievement' => 'nullable|string|max:255',
                'path_video' => 'nullable|string|max:255',
            ];
        } else if (request()->isMethod('PUT')) {
            $data = [
                'heading' => 'required|string|max:255',
                'subheading' => 'required|string|max:255',
                'banner' => 'sometimes|image|mimes:png,jpg,jpeg|max:5120',
                'achievement' => 'nullable|string|max:255',
                'path_video' => 'nullable|string|max:255',
            ];
        }
        return $data;
    }
}
