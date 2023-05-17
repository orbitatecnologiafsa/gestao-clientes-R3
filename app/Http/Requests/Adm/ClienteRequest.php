<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            "documento" => "required|max:18|min:11|unique:clientes,documento",
            "valor" => "required",
            "id_empresa" => "nullable|numeric",
            "data_vencimento" => "required|date",
            "status" => "required|numeric",
            "bloqueado" => "required|numeric",
            "data_bloqueio" => "nullable|date",
            "qtd_carencia" => "nullable|numeric",
            "cidade" => "required"
           
        ];

        if ($this->method() == 'PUT') {
           
           // "required|email|unique:clients,email,{$id},id";
            $rules['documento'] = "required|max:18|min:11|unique:clientes,documento,{$id},id";
        }
        return $rules;
    }

    public function messages()
    {
        return [

            "nome.required" => "O nome do cliente é obrigatorio",
            "nome.max" => "O nome do cliente não pode conter mais de 30 caracteres",
            "nome.min" => "O nome  do cliente não pode conter menos de 3 caracteres",

            "documento.required" => "O documento do cliente é obrigatorio",
            "documento.max" => "O documento do cliente não pode conter mais de 18 caracteres",
            "documento.min" => "O documento do cliente não pode conter menos de 11 caracteres",
            "docuemnto.unique" => "Este documento já esta em uso!",
            "valor.required" => "O valor de mensalidade do cliente é obrigatorio",
            "valor.numeric" => "O  valor de mensalidade do cliente é invalido, insira um numero valido",
            "cidade.required" => "O campo cidade é obrigatorio",
            "data_vencimento.required" => "O vencimento do cliente é obrigatorio",
            "data_vencimento.date" => "Inserir uma  data de vencimento  valida",

            "status.required" => "O campo status é obrigatorio",
            "status.numeric" => "O status é invalido, insira um valor correspondente a ativo/inativo",

            "bloqueado.required" => "O campo bloqueio é obrigatorio",
            "bloqueado.numeric" => "O campo bloqueado é invalido, insira um valor  correspondente a  bloqueado/desbloqueado",

            "data_bloqueio.required" => "O campo data de bloqueio é obrigatorio",
            "data_bloqueio.date" => "O campo data de bloqueio é invalido, informe uma data valida!",

            "qtd_carencia.required" => "O campo dias de carencia é obrigatorio",
            "qtd_carencia.numeric" => "O campo  dias de carencia é invalido!",

            "id_empresa.numeric" => "O campo empresa é invalido!"
        ];
    }
}
