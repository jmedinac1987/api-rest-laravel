<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeliculaUpdateRequest extends FormRequest
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
        $rules = [
            'titulo' => 'required', 
            'genero' => 'required', 
            'director' => 'required', 
            'fechaEstreno' => 'required', 
            'precio' => 'required|numeric|max:999999999', 
            'sipnosis' => 'required',             
        ];
        
        return $rules;
    }
}
