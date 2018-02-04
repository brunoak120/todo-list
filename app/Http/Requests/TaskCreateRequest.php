<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskCreateRequest extends FormRequest
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
            'category_id' => 'required|numeric',
            'title' => [
                'required',
                'max:200',
                Rule::unique('tasks')->ignore($this->id)->where(function ($query) {
                    $query->where('user_id', auth()->user()->id);
                })
            ],
            'content' => 'required|max:255',
            'started' => 'required|date_format:"d/m/Y"',
            'stopped' => 'required|date_format:"d/m/Y"'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'category_id.required' => 'Selecione uma categoria.',
            'category_id.numeric' => 'Formato da categoria inválido.',
            'title.required' => 'Título é obrigatório.',
            'title.max' => 'Tamanho de título muito grande. Máximo 200 caracteres.',
            'title.unique' => 'Esse título já foi cadastrado',
            'content.required' => 'Campo descrição é obrigatório.',
            'content.max' => 'Descrição muito grande. Máximo 255 caracteres.',
            'started.required' => 'Campo data inicial é obrigatório.',
            'started.date_format' => 'Formato de data inválido.',
            'stopped.required' => 'Campo data inicial é obrigatório.',
            'stopped.date_format' => 'Formato de data inválido.'
        ];
    }
}
