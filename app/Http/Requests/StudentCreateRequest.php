<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
            'nis' => 'unique:students|required',
            'name' => 'max:50|required',
            'gender' => 'required',
            'class_id' => 'required'
        ];
    }

    // di bawah mengubah atribut / nama table error yang di tampilkan
    public function attributes() {
        return [
            'class_id' => 'class'
        ];
    }

    // di bawah mengubah pesan yang muncul saat error
    public function messages(){
        return[
            'nis.required' => 'NIS wajib diisis',
            // nis.required = pesan untuk required ( wajib isi )
            'name.required' => 'Name wajib diisis',
            'name.max' => 'Name maksimal :max karakter',
            'gender.required' => 'Gender wajib diisis',
            'class_id.required' => 'Class wajib diisis'
        ];
    }
}
