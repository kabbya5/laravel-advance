<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        $data = [
            'post_title' => 'required|unique:posts,post_title',
            'post_excerpt' => 'required',
            'post_body' => 'required',
            'post_img' => 'required|mimes:png,jpg,jpeg',
        ];

        switch($this->method()){
            case "PATCH":
            case 'PUT':
                $data['post_title'] = 'required|unique:posts,post_title,$this->id';
        }
        return $data;
    }

    public function messages()
    {
        return[
            'post_title.required' => 'post title is nedded!',
        ];
    }
}
