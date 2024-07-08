<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCategoryFormRequest extends FormRequest
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
        $id = $this->segment(3);

        return [
            'categorie'         => "required|min:3|max:60|unique:categories,categorie,{$id},id",
            'status'           => "required|min:1|max:60|unique:categories,status,{$id},id",
            'description'   => 'max:2000',
        ];
    }
}
