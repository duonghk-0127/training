<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'text' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ];
    }
    public function messages()
    {
        return [
            'text.required' => 'A text is required',
            'image.required' => 'A image is required',
            'image.image' => 'Please input the image',
            'image.mimes' => 'Please input the image',
            'image.max' => 'Image is very height',
        ];
    }
}
