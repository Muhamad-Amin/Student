<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'unique:teachers|required'
        ];
    }

    public function attributes(){
        return [
            'name' => 'Teacher'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Name teacher wajib diisi'
        ];
    }
}
