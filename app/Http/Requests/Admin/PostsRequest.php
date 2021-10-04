<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
        $rules = [
            'title' => 'required',
            'preview' => 'required',
            'description' => 'required',
            'category' => [],
            'image' => 'mimes:jpg,png',
        ];

        if($this->input('category') == null){
            $rules['category'] = 'required';
        };

        return $rules;
    }
}
