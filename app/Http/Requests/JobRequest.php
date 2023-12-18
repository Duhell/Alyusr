<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'job_image'=>'sometimes|image|max:1024|nullable|mimes:png,jpg,jpeg',
            'job_position' => 'max:255',
            'job_location'=> 'max:255',
            'DescriptionTitle.*.name' => "max:255",
            'DescriptionRequirements.*.name'=>'max:255'
        ];
    }
}
