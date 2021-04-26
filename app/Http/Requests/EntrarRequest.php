<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrarRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O campo e-mail é obrigatório!',
            'email.email' => 'O e-mail deve ser um endereço de email válido!',
    
            'password.required' => 'O campo senha é obrigatório!',
            'password.min' => 'O senha deve ter pelo menos :min caracteres!',
        ];
    }
}
