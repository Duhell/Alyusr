<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'photo'=>"max:2048|image|mimes:jpeg,png,jpg",
            'tag'=> 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
          'photo.max'=>'Image size must below 2MB.'
        ];
    }
}
