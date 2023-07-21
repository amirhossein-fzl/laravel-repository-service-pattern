<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "slug" => strtolower($this->slug),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => ["required", "max:255"],
            "slug" => ["required", "unique:posts,slug", "max:255"],
            "content" => "required",
            "status" => Rule::in("true", "false"),
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "The post title filed is required!",
            "title.max" => "The post title can be a maximum of 255 characters!",
            "slug.required" => "The post slug filed is required!",
            "slug.unique" => "The post slug is already exists!",
            "slug.max" => "The post slug can be a maximum of 255 characters!",
            "content.required" => "The post content field is required!",
            "status.in" => "The post status must be boolean string!",
        ];
    }
}
