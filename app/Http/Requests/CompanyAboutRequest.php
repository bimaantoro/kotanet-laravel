<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyAboutRequest extends FormRequest
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
                'description' => 'required|string',
                'vision_keypoints' => 'sometimes|array',
                'vision_keypoints.*' => 'required|string',
                'mission_keypoints' => 'sometimes|array',
                'mission_keypoints.*' => 'required|string',
            ];
        } else if (request()->isMethod('PUT')) {
            $data = [
                'description' => 'required|string',
                'vision_keypoints' => 'sometimes|array',
                'vision_keypoints.*' => 'required|string',
                'mission_keypoints' => 'sometimes|array',
                'mission_keypoints.*' => 'required|string',
            ];
        }

        return $data;
    }
}
