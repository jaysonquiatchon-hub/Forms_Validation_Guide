<?php

namespace App\Http\Requests;

use App\Rules\ValidCourseCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if (is_string($this->input('code'))) {
            $this->merge([
                'code' => strtoupper(trim($this->input('code'))),
            ]);
        }
    }

    public function rules(): array
    {
        $course = $this->route('course');

        return [
            'code' => [
                'required',
                'string',
                'max:20',
                new ValidCourseCode(),
                Rule::unique('courses', 'code')->ignore($course),
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'units' => [
                'required',
                'integer',
                'between:1,6',
            ],

            'instructor_id' => [
                'nullable',
                Rule::exists('instructors', 'id'),
            ],

            'is_active' => [
                'sometimes',
                'boolean',
            ],

            'image' => [
                'nullable',
                'image',
                'max:2048',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'The course code is required.',
            'code.unique' => 'This course code already exists.',
            'code.max' => 'The course code must not exceed 20 characters.',

            'title.required' => 'The course title is required.',
            'title.max' => 'The course title must not exceed 255 characters.',

            'units.required' => 'Please enter the number of units.',
            'units.integer' => 'Units must be a whole number.',
            'units.between' => 'Units must be between 1 and 6.',

            'instructor_id.exists' => 'Please select a valid instructor.',

            'image.image' => 'The uploaded file must be an image.',
            'image.max' => 'The image must not exceed 2 MB.',
        ];
    }
}