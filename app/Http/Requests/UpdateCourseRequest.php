<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => 'required|string|max:20|unique:courses,code,' . $this->course->id,
            'name' => 'required|string|max:255',
            'credits' => 'required|integer|min:1|max:10',
            'description' => 'nullable|string',
        ];
    }
}