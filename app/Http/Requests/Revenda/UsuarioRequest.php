<?php

namespace App\Http\Requests\Revenda;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->id ?? "";
        $rules =[
            "nome" => "required",
            "email" => "required|email|unique:users,email",
            "id_empresa" => "required|numeric",
            "password" =>"required|confirmed",
            "nivel" => "required",
            "password_confirmation" => 'required'
        ];
        if($this->method() == 'PUT')
        {
          $rules['email'] = "required|email|unique:users,email,{$id},id";
          $rules['password'] = "nullable";
          $rules['password_confirmation'] = "nullable";
        }
        return $rules;
    }

    public function messages()
    {
        return [
            "nome.required" => "O campo nome é obrigatorio",
            "id_empresa.required" => "O campo empresa é obrigatorio",
            "id_empresa.numeric" => "O campo empresa invalido!",
            "email.required" => "O campo email é obrigatorio",
            "email.email" => "Inserir um email valido!",
            'email.unique' => "Este email já esta em uso",
            "nivel.required" => "O campo nivel é obrigatorio",
            'password_confirmation.required' => "O campo confirmar senha é obrigatorio",
            "password.required" => "O campo senha é orbrigatorio",
            "password.confirmed" => "As senhas não conferem"
        ];
    }
}
