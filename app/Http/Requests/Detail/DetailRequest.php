<?php

namespace App\Http\Requests\Detail;

use Illuminate\Foundation\Http\FormRequest;

class DetailRequest extends FormRequest
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
            'oferta'       => 'required|min:3|max:150',
            'detalhes'     => 'required|min:3|max:150',
            'regras'       => 'required|min:3|max:150',
            'telefone'     => 'required',
            'whatsapp'     => 'required',
            'desconto'     => 'numeric',
        ];
    }
}
