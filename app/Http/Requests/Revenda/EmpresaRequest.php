<?php

namespace App\Http\Requests\Revenda;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
        $id = intval($this->id) ?? "";

        $rules = [
            "nome" => "required",
            "documento" => "required|max:18|min:11|unique:empresas,documento",
            "responsavel" => "nullable",
            "cidade" => "required",
            "estado" => "nullable|required",
            "revenda" => "required"
        ];

        if ($this->method() == 'PUT') {

            // "required|email|unique:clients,email,{$id},id";
            $rules['documento'] = "required|max:18|min:11|unique:empresas,documento,{$id},id";
        }

        return $rules;
    }

    public function messages()
    {
        return [

            "documento.required" => "O documento do cliente é obrigatorio",
            "documento.max" => "O documento do cliente não pode conter mais de 18 caracteres",
            "documento.min" => "O documento do cliente não pode conter menos de 11 caracteres",
            "documento.unique" => "Este documento já esta em uso!",
            "responsavel.required" => "O  responsavel é obrigatorio",
            "cidade.required" => "A cidade é obrigatorio",
            "estado.required" => "O campo estado é obrigatorio",
            "nome.required" => "O nome é obrigatorio",
            "revenda.required" => "O campo revenda é obrigatorio"

        ];
    }
}
