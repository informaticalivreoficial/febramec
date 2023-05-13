<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AcademiaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3);

        return [
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'min:3', 'max:255', "unique:academias,email,{$id},id"],
            'content' => 'nullable|min:3',
            'cep' => 'required',            
            'celular' => 'required'
        ];
    }
}
