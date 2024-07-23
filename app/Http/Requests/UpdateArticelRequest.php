<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticelRequest extends FormRequest
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
            'categories_id' => 'required|numeric',
            'title' => 'required|string',
            'slug' => 'nullable|string',
            'desc' => 'required|string',
            'img' => 'nullable|image|mimes:png,jpg,jpeg|max:3024',
            'status' => 'required|in:draft,publish',
            'publis_data' => 'required|date'
        ];
    }
}
