<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
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
            'nome' => 'required',
            'marca' => 'required',
            'tipo' => 'required',
            'preco' => 'required',
            'descricao' => 'required',
            'imagem' => ['required','image'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'preco.required' => 'O campo preço é obrigatório!',
            'descricao.required' => 'O campo descrição é obrigatório!',
        ];
    }
}
