<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssignmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file' => [
                // 'required',
                // 'mimes:txt',
            ],
            'description' => [
                'bail',
                'required',
            ],
            'due' => [
                'bail',
                'required',
            ]
        ];
    }

    public function messages()
    {
        return [
            // 'file.file_extension' => 'File Input Invalid !!!',
        ];
    }
}
