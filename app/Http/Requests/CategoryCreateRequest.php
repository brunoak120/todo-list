<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryCreateRequest extends FormRequest
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
            'name' => [
                'required',
                'max:100',
                Rule::unique('categories')->ignore($this->id)->where(function ($query) {
                    $query->where('user_id', auth()->user()->id);
                })
            ]
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
            return [
                'name.required' => 'Campo categoria é obrigatorio.',
                'name.max' => 'Nome da categoria muito grande. Máximo 100 caracteres.',
                'name.unique' => 'Essa categoria já foi adicionada no seu usuário.'
            ];
    }
}
