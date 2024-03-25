<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required',
            'apelido' => 'required',
            'cidade'=> 'required',
            'bairro'=> 'required',
            'cep'=> 'required',
            'email'=> 'required|unique:autors',
            'telefone'=> 'required',
        ];

        if($this->method() == 'POST'){
            $rules['email'] = [
                'required'
            ];
        }
        
        return $rules;
    }

    public function messages(){
        return [
            'nome' => 'O campo :attribute é obrigatório',
            'apelido' => 'O campo :attribute é obrigatório',
            'cidade'=> 'O campo :attribute é obrigatório',
            'bairro'=> 'O campo :attribute é obrigatório',
            'cep'=> 'O campo :attribute é obrigatório',
            'email'=> 'O campo :attribute é obrigatório',
            'email'=> 'o campo :attribute já está cadastrado',
            'telefone'=> 'O campo :attribute é obrigatório', 
        ];
    }
}
