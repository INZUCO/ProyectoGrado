<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            //
            'name' => 'required',
            'slug' => 'required|unique:posts,slug',
            //Campo slug => requerido, Unico:en la NOMBRE_tabla, NOMBRE_campo 

            'user_id'       => 'required|integer',
            'category_id'   => 'required|integer',
            'tags'          => 'required|array',
            'body'          => 'required',
            'status'        => 'required|in:PUBLISHED,DRAFT', //Requerido y Sea publico o borrador.
        ];

        /* Si se envio algo en el campo image        */
        if($this->get('file')){
            //Se añade el campo imagen al arreglo y valida que sea jpg,jpeg,png
            $rules = array_merge($rules, ['file' => 'mimes:jpg,jpeg,png']);
        }

        return $rules;
    }
}
