<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassCreateRequest extends FormRequest
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
            'name' => 'unique:class|required',
            'teacher_id' => 'required'
        ];
    }

    // di bawah mengubah atribut / nama table error yang di tampilkan
    public function attributes() {
        return [
            'name' => 'Class',
            'teacher_id' => 'Teacher'
        ];
    }

    // di bawah mengubah pesan yang muncul saat error
    public function messages(){
        return[
            'name.required' => 'Class wajib diisis',
            'teacher_id.required' => 'Teacher wajib di isi'
        ];
    }
}
