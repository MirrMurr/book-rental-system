<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            "title" => 'required|max:255',
            "authors" => 'required|max:255',
            "releasedAt" => 'required|date|before:now',
            "pages" => 'required|numeric|min:1',
            "isbn" => 'required|regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i',
            "description" => 'nullable',
            "genres" => 'array',
            "genres.*" => 'integer',
            "inStock" => 'required|integer|min:0',
            "coverImage" => 'url',
        ];
    }
}
