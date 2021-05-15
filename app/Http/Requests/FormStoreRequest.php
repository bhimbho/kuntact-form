<?php

namespace App\Http\Requests;

use App\Rules\FileExtValidation;
use Illuminate\Foundation\Http\FormRequest;

class FormStoreRequest extends FormRequest
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
            // 'upload_file' => 'file|mimetypes:application/pdf, text/csv',
            'upload_file' => ['file', new FileExtValidation],
            'fullname' => 'required|string|max:50',
            'email' => 'required|email',
            'message' => 'required',
        ];
    }
}
